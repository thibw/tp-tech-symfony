<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends controller
{
    /**
     * @Route( path="/category", name="category_page")
     */
    public function categoryDisplay()
    {
        $Categories = $this->get('doctrine')
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('category.html.twig', array(
            'categories' => $Categories,
        ));
    }

    /**
     * @Route( path="/category/{id}", name="category_single")
     */
    public function categoryDisplayUnit($id)
    {
        $UnitCategory = $this->get('doctrine')
            ->getRepository(Product::class)
            ->FindByCategory($id);

        return $this->render('single_category.html.twig', array(
            'UnitCategory' => $UnitCategory,
        ));

    }
}