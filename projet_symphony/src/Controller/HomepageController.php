<?php

namespace App\Controller;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $FiveLastProducts = $this->get('doctrine')
            ->getRepository(Product::class)
            ->FindByFiveLast();
        return $this->render('home.html.twig', array(
            'FiveLastProducts' => $FiveLastProducts
        ));
    }

}




