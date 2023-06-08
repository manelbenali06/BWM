<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/user/profile', name: 'app_profile')]
    public function index(): Response   //fonction PHP appelée "index" qui renvoie un objet Symfony Response.
    {
        //La fonction obtient d'abord l'utilisateur actuel en utilisant la méthode "getUser()",
        // qui est probablement fournie par un système d'authentification.
        $user = $this->getUser();
        // il rend un modèle Twig appelé "index.html.twig" et lui transmet l'objet utilisateur en tant que variable.
        return $this->render('profile/index.html.twig', [
            'user' => $user,
        ]);
    }
}