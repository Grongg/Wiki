<?php

namespace App\Controller\Customer;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
}
