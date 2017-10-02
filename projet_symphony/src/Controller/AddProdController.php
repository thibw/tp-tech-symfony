<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class AddProdController extends Controller
{
    /**
     * @Route( path="/addProd", name="add_product")
     */

    public function addProd(Request $request)
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $product = $form->getData();
            $manager = $this->getDoctrine()->getManager();

            $file = $product->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('kernel.root_dir') . '/../public/uploads', $fileName
            );
            $product->setImage($fileName);
            $manager->persist($product); /* Declaration de la nouevlle entity */
            $manager->flush();           /* Enregistrement dans la bdd */
            return $this->redirectToRoute('add_product'); }

        return $this->render('addProd.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}