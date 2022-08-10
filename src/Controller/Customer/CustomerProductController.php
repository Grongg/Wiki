<?php

namespace App\Controller\Customer;

use App\Services\CookieService;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerProductController extends AbstractController
{
    #[Route('/customer/product/{id}', name: 'customer_product')]
    public function index($id, ProductRepository $productRepository, CookieService $cookieService, Request $request): Response
    {
        $product = $productRepository->find($id);
        $session = $cookieService->checkAndSetCookieNoRepeat($request);

        if (!$product)
            return $this->redirectToRoute("customer_home");
        return $this->render('customer/customer_product/product.html.twig', [
            'product' => $product,
            'session' => $session
        ]);
    }
}
