<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PlayerRepository $playerRepository): Response
    {
        $tripWinner = $playerRepository->getTripWinner();
        $dronesWinners = $playerRepository->getDronesWinners();

        return $this->render('home/index.html.twig', [
            'tripWinner' => $tripWinner,
            'dronesWinners' => $dronesWinners,
        ]);
    }
}
