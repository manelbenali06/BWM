<?php
namespace App\Controller;

use App\Form\EditProfilType;
use App\Form\EditPasswordType;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/utilisateur/profile')]
#[IsGranted('ROLE_USER')]
class ProfileMeController extends AbstractController
{
    
    #[Route('/', name: 'app_profile')]
 
    public function index(OrderRepository $orderRepository): Response
    {
        $user = $this->getUser();
        $order = $orderRepository->findOneBy(['user' => $user]);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'order' => $order,
        ]);
    }
                
    #[Route('/modifier', name: 'edit_profile')]     
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $user = $this->getUser();
        $form = $this->createForm(EditProfilType::class, $user);
        $form->handleRequest($request);
            
        if ($form->isSubmitted() && $form->isValid()) {      
            $entityManager->flush();
            $this->addFlash('success', 'Votre profil a bien été modifié.');
                    
            return $this->redirectToRoute('app_profile');
        } 
        
        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/modifer-mot-de-passe', name: 'edit_password')]     
    public function editPassword(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {   
        $user = $this->getUser();
        $form = $this->createForm(EditPasswordType::class, $user);
        $form->handleRequest($request);
            
        if ($form->isSubmitted() && $form->isValid()) {      
            $oldPassword = $form->get('oldPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();
            
            if (!$passwordHasher->isPasswordValid($user, $oldPassword)) {
                $this->addFlash('error', 'Ancien mot de passe incorrect.');
            } else {
                $encodedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($encodedPassword);
                $entityManager->flush();
                $this->addFlash('success', 'Votre mot de passe a été modifié avec succès.');
            }
            
            return $this->redirectToRoute('app_profile');
        } 
        
        return $this->render('profile/password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}