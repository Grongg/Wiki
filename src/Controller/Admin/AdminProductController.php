<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Services\HandleImageService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/product')]
class AdminProductController extends AbstractController
{
    #[Route('/', name: 'admin_product_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository,
                        PaginatorInterface $paginator,
                        Request $request): Response
    {
        $products = $paginator->paginate(
            $productRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $this->render('admin/product/index.html.twig', [
            'products' => $products
        ]);
    }

    #[Route('/new', name: 'admin_product_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, HandleImageService $handleImage): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            if ($file)
            {
                $handleImage->save($file, $product, true);
            }

            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Nouveau produit creer');
            return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/product/new.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_product_show', methods: ['GET'])]
    public function show(Product $product): Response
    {
        return $this->render('admin/product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_product_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager, HandleImageService $handleImage): Response
    {
        $oldImage = $product->getImage();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            if ($file)
            {
                $handleImage->edit($file, $product, $oldImage, true);
            }            
            $entityManager->flush();

            return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/product/edit.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            for ($i=0; $i < count($product->getCommandShopLines()) ; $i++)
                $entityManager->remove($product->getCommandShopLines()[$i]);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_product_index', [], Response::HTTP_SEE_OTHER);
    }
}
