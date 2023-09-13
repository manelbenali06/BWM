<?php

namespace App\Controller;

use App\Entity\Contact; 
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer,EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager ->persist($contact);
            $entityManager->flush();
            // Send the email
            $email = (new Email())
                ->from($contact->getEmail())
                ->to('manichbenali13@gmail.com') // Replace with the recipient's email address
                ->subject('Contact Form Submission')
                ->html('<p><strong>Nom:</strong> '.$contact->getLastname().'</p>
                        <p><strong>Email:</strong> '.$contact->getEmail().'</p>
                        <p><strong>Téléphone:</strong> '.$contact->getPhone().'</p>
                        <p><strong>Message:</strong> '.$contact->getMessage().'</p>');

            $mailer->send($email);

            $this->addFlash('success', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');

            // Optionally, you can redirect to another page after successful form submission
            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}