<?php

namespace App\Controller\Prestations;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Prestations')]
class LipsController extends AbstractController
{
    #[Route('/lips', name: 'lips_page')]
    public function lipsPage(): Response
    {
        return $this->render('lips/index.html.twig');
    }
}