<?php

namespace App\Controller\Api;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MeController extends AbstractController
{
    public function __invoke( /*#[CurrentUser] User $user*/): User
    {
        $user = $this->getUser();
        dd($user);

        return $user;
    }
}