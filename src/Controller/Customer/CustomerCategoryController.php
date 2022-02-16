<?php

namespace App\Controller\Customer;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerCategoryController extends AbstractController
{
    #[Route('/customer/category/{id}', name: 'customer_category')]
    public function showCategory($id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);

        if (!$category)
            return $this->redirectToRoute("home");

        return $this->render('customer_category/category.html.twig', [ 
                'category' => $category
        ]);
    }
}
