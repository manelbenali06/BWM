<?php
namespace App\Controller\Admin;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categorie', name: 'admin_category_')]
class AdminCategoryController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('admin/category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/nouvelle', name: 'new', methods: ['GET',"POST"])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form?->isSubmitted() && $form?->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();
            $this->addFlash('success', 'votre catégorie a bien été créer' );

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/category/new.html.twig', [
            'category' => $category,
            'form' => $form?->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('admin/category/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/{id}/modifier', name: 'edit', methods: ['GET','POST'])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        //param converter permet de rattacher mon formulaire a mon instance
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form?->isSubmitted() && $form?->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'votre catégorie a bien été modifier' );

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('admin/category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['GET','POST'])]
     public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
    
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
        $entityManager->remove($category);
        $entityManager->flush();
        $this->addFlash('success', 'votre catégorie a bien été supprimer' );
        }
        return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
    }
} 