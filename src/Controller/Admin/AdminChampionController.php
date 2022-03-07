<?php

namespace App\Controller\Admin;

use App\Entity\Champion;
use App\Form\ChampionType;
use App\Repository\ChampionRepository;
use App\Services\ChampionService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/champion')]
class AdminChampionController extends AbstractController
{
    #[Route('/', name: 'admin_champion_index', methods: ['GET'])]
    public function index(ChampionRepository $championRepository,
                        ChampionService $championService,
                        PaginatorInterface $paginator,
                        EntityManagerInterface $entityManager,
                        Request $request): Response
    {
        // $championService->createChampions($entityManager, $championRepository);
        $champions = $paginator->paginate(
            $championRepository->findBY([], ['name' => 'ASC']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $this->render('admin/champion/index.html.twig', [
            'champions' =>$champions
        ]);
    }

    #[Route('/new', name: 'admin_champion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $champion = new Champion();
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($champion);
            $entityManager->flush();
            
            $this->addFlash('success', 'Nouveau champion crée');
            return $this->redirectToRoute('admin_champion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/champion/new.html.twig', [
            'champion' => $champion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_champion_show', methods: ['GET'])]
    public function show(Champion $champion): Response
    {
        return $this->render('admin/champion/show.html.twig', [
            'champion' => $champion,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_champion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Champion $champion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        // dd(DataDragonAPI::getStaticChampions());
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_champion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/champion/edit.html.twig', [
            'champion' => $champion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_champion_delete', methods: ['POST'])]
    public function delete(Request $request, Champion $champion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$champion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($champion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_champion_index', [], Response::HTTP_SEE_OTHER);
    }
}
