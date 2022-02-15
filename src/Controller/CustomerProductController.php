<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function PHPUnit\Framework\isEmpty;

class CustomerProductController extends AbstractController
{
    #[Route('/customer/product/{id}', name: 'customer_product')]
    public function index($id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);

        if (!$product)
            return $this->redirectToRoute("home");
        return $this->render('customer_product/product.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/customer/category/{id}', name: 'customer_category')]
    public function showCategory($id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);

        if (!$category)
            return $this->redirectToRoute("home");

        return $this->render('customer_product/category.html.twig', [ 
                'category' => $category
        ]);
    }
}
