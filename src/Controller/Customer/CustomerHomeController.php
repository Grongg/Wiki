<?php

namespace App\Controller\Customer;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerHomeController extends AbstractController
{
    #[Route('/', name: 'customer_home')]
    public function index(CategoryRepository $categoryRepository,
                            ProductRepository $productRepository): Response
    {

        $products = $productRepository->findBy([],[
            'id' => 'DESC'
        ],
        6);

        return $this->render('customer/home/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'products' => $products
        ]);
    }
}
