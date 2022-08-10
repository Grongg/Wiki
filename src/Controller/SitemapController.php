<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Services\CookieService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SitemapController extends AbstractController
{
/**
 * @Route("sitemap/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
 */
    public function index(Request $request, ProductRepository $productRepository, CookieService $cookieService)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        // Nous récupérons le nom d'hôte depuis l'URL
        $hostname = $request->getSchemeAndHttpHost();

        // On initialise un tableau pour lister les URLs
        $urls = [];

        // On ajoute les URLs "statiques"
        $urls[] = ['loc' => $this->generateUrl('customer_home')];
        $urls[] = ['loc' => $this->generateUrl('app_register')];
        $urls[] = ['loc' => $this->generateUrl('app_login')];

        // On ajoute les URLs dynamiques des articles dans le tableau
        foreach ($productRepository->findAll() as $product) {
            $images = [
                'loc' => '/uploads/images/'.$product->getImage(), // URL to image
                'title' => $product->getName()    // Optional, text describing the image
            ];

            $urls[] = [
                'loc' => $this->generateUrl('customer_product' , [
                    'id' => $product->getId(), // Product identifier
                    'slug' => $product->getName(),
                ]),
                'image' => $images,
            ];
        }

        // Fabrication de la réponse XML
        $response = new Response(
            $this->renderView('sitemap/sitemap.html.twig', ['urls' => $urls,
                'hostname' => $hostname, 'session' => $session]),
            200
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}