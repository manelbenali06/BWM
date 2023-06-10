<?php
namespace App\Controller;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AppointmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/appointment', name: 'appointment_')]
class AppointmentController extends AbstractController
{
    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
public function create(Request $request, EntityManagerInterface $entityManager): Response
{
    $appointment = new Appointment();
    $form = $this->createForm(AppointmentType::class, $appointment);
    $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // Enregistrer l'objet Appointment dans la base de données
    
        $entityManager->persist($appointment);
        $entityManager->flush();
        $this->addFlash('success', 'votre Rendez vous à bien été bien en compte' );
    // Rediriger ou afficher un message de confirmation
    return $this->redirectToRoute('appointment_index', [], Response::HTTP_SEE_OTHER);
    }

    // Afficher le formulaire de prise de rendez-vous
    return $this->render('appointment/create.html.twig', [
    'form' => $form,
    'appointment' => $appointment,
    ]);
    }

    #[Route('/', name: 'index')]
    public function index(AppointmentRepository $appointmentRepository): Response
    {
        return $this->render('appointment/index.html.twig', [
            'appointments' => $appointmentRepository->findAll(),
        ]);
    }
    
}