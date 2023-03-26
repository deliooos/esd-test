<?php

namespace App\Controller;

use App\Form\QuizType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(QuizType::class);
        $form->handleRequest($request);

        return $this->renderForm('quiz/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
