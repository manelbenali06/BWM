<?php

namespace App\Controller\Prestations;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/Prestations')]
class NailsController extends AbstractController
{
    #[Route('/nails', name: 'nails_page')]
    public function nailsPage(): Response
    {
        return $this->render('nails/index.html.twig');
    }
}