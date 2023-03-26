<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralConditionsController extends AbstractController
{
    #[Route('/cgu', name: 'app_general_conditions')]
    public function index(): Response
    {
        return $this->render('general_conditions/index.html.twig');
    }
}
