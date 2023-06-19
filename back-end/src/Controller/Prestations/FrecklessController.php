<?php

namespace App\Controller\Prestations;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/Prestations')]
class FrecklessController extends AbstractController
{
    #[Route('/frekless', name: 'freckless_page')]
    public function frecklessPage(): Response
    {
        return $this->render('freckless/index.html.twig');
    }
}