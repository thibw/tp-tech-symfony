<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Product;
use App\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductPageController extends Controller
{
    /**
     * @Route( path="/product", name="product_page")
     */
    public function productDisplay()
    {
        $products = $this->get('doctrine')
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('product.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * @Route( path="/product/{id}", name="product_single")
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function productDisplayUnit(Request $request, $id)
    {
        /** @var Product $unitProduct */
        $unitProduct = $this->get('doctrine')
            ->getRepository(Product::class)
            ->find($id);
        $comments = $unitProduct->getComment();
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isValid()){
          $comment = $form->getData();
          $em = $this->getDoctrine()->getManager();
          $comment->setProduct($unitProduct);
          $em->persist($comment);
          $em->flush();
          return $this->redirect($request->getUri());
        };

        return $this->render('single.html.twig', array(
            'product' => $unitProduct,
            'comments' => $comments,
            'form' => $form->createView()
        ));
    }
}