<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('admin/index.html.twig');
    }
    
    // #[Route('/report', name: 'report')]
    // public function report_generator(): Response
    // {
    //     // Ваш код для генерации отчета
        
    //     return $this->render('report/index.html.twig');
    // }
    #[Route('/moderator', name: 'register_moderator')]
    public function register_moderator(): Response
    {
        // Ваш код для генерации отчета
        
        return $this->render('admin/register.html.twig');
    }
    #[Route('/faculty', name: 'faculty')]
    public function faculty(): Response
    {
        // Ваш код для генерации отчета
        
        return $this->render('admin/faculty.html.twig');
    }

}

