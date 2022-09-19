<?php

namespace App\Controller\Customer;

use App\Services\CookieService;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerCategoryController extends AbstractController
{
    #[Route('/customer/category/{id}', name: 'customer_category')]
    public function showCategory($id, CategoryRepository $categoryRepository, CookieService $cookieService, Request $request): Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $category = $categoryRepository->find($id);

        if (!$category)
            return $this->redirectToRoute("customer_home");

        return $this->render('customer/customer_category/category.html.twig', [ 
                'category' => $category,
                'session' => $session
        ]);
    }

    #[Route('/customer/shop', name: 'shop')]
    public function shopindex(CategoryRepository $categoryRepository, ProductRepository $productRepository, CookieService $cookieService, Request $request): Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $products = $productRepository->findBy([],[
            'id' => 'DESC'
            ],
        6);

        return $this->render('customer/shop/shop.html.twig', [ 
                'categories' => $categoryRepository->findAll(),
                'products' => $products,
                'session' => $session
        ]);
    }
}
