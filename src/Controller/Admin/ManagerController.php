<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManagerController extends AbstractController
{
    #[Route('/admin/manager', name: 'admin_manager')]
    public function index(): Response
    {
        return $this->render('admin/manager/index.html.twig');
    }
}
