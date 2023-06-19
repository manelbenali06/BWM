<?php

namespace App\Controller\Prestations;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Prestations')]
class BrowsController extends AbstractController
{
    #[Route('/brows', name: 'brows_page')]
    public function browsPage(): Response
    {
        return $this->render('brows/index.html.twig');
    }
}