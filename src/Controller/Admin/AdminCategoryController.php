<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Services\HandleImageService;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/category')]
class AdminCategoryController extends AbstractController
{
    #[Route('/', name: 'admin_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository,
                        PaginatorInterface $paginator,
                        Request $request): Response
    {
        $categories = $paginator->paginate(
            $categoryRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/new', name: 'admin_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, HandleImageService $handleImage): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            if ($file)
            {
                $handleImage->save($file, $category, true);
            }

            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash("success","La catégorie a bien été ajouté.");
            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'admin_category_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('admin/category/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager, HandleImageService $handleImage): Response
    {
        $oldImage = $category->getImage();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            if ($file)
            {
                $handleImage->edit($file, $category, $oldImage, true);
            }


            $entityManager->flush();

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
