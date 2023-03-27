<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\Player;
use App\Form\PlayerType;
use App\Form\QuizType;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\EntityManagerInterface;
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

        $results = $form->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_quiz_validate', [
                'results' => $results,
            ]);
        }

        return $this->renderForm('quiz/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/quiz/validate', name: 'app_quiz_validate')]
    public function validate(Request $request, EntityManagerInterface $em, CompetitionRepository $competitionRepository): Response
    {
        $results = $request->get('results');

        if (!$results) {
            return $this->redirectToRoute('app_quiz');
        }



        $form = $this->createForm(PlayerType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newPlayer = new Player();
            $player = $form->getData();

            $newPlayer->setFirstname($player->getFirstname());
            $newPlayer->setLastname($player->getLastname());
            $newPlayer->setMail($player->getMail());
            $newPlayer->setAge($player->getAge());
            $newPlayer->setAdress($player->getAdress());
            $newPlayer->setCountry($player->getCountry());

            if ($player->getSecondFirstName() && $player->getSecondLastName() && $player->getSecondMail() && $player->getSecondAge() && $player->getSecondAdress() && $player->getSecondCountry()) {
                $newPlayer->setSecondFirstname($player->getSecondFirstName());
                $newPlayer->setSecondLastname($player->getSecondLastName());
                $newPlayer->setSecondMail($player->getSecondMail());
                $newPlayer->setSecondAge($player->getSecondAge());
                $newPlayer->setSecondAdress($player->getSecondAdress());
                $newPlayer->setSecondCountry($player->getSecondCountry());
            }

            $em->persist($newPlayer);

            if ($results['founder'] === 'Jack Wayman' && $results['year'] === '1967' && $results['city'] === 'New York' && $results['tech'] === 'DVD' && $results['presidentInterventions'] === 'Keynotes') {
                $competition = $competitionRepository->findAll();
                if (!$competition) {
                    $competition = new Competition();
                } else {
                    $competition = $competition[0];
                }
                $competition->addPlayer($newPlayer);
            }
            $em->flush();

            return $this->redirectToRoute('app_quiz_results');
        }

        return $this->renderForm('quiz/validate.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/quiz/results', name: 'app_quiz_results')]
    public function results(): Response
    {
        return $this->render('quiz/results.html.twig');
    }
}
