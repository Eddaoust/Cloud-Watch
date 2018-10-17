<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_home")
     */
    public function index()
    {
        return $this->render('product/home.html.twig');
    }

    /**
     * @Route("/list/{cat}", name="product_list")
     */
    public function list($cat)
    {
        $repo = $this->getDoctrine()
            ->getRepository(Product::class);
        $product = $repo->findBy(
            ['category' => $cat]
        );

        return $this->render('product/list.html.twig', [
            'products' => $product
        ]);
    }

    /**
     * @Route("/product/{id}", name="product_one")
     */
    public function oneProduct($id)
    {
        $repo = $this->getDoctrine()
            ->getRepository(Product::class);
        $product = $repo->find($id);

        return $this->render('product/oneProduct.html.twig', [
            'product' => $product
        ]);
    }

    /**
     * @Route("/terms", name="product_terms")
     */
    public function termsOfUse()
    {
        return $this->render('product/termsOfUse.html.twig');
    }

}
