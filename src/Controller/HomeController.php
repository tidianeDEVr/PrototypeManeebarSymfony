<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('front-office/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/nos-services', name: 'nos_services')]
    public function showServices(): Response
    {
        return $this->render('front-office/home/nos.services.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/qui-sommes-nous', name: 'qui_sommes_nous')]
    public function showWhoAreUs(): Response
    {
        return $this->render('front-office/home/qui.sommes.nous.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contacts', name: 'nous_contacter')]
    public function showContacts(): Response
    {
        return $this->render('front-office/home/contacts.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/comment-ca-marche', name: 'comment_ca_marche')]
    public function showHowItWorks(): Response
    {
        return $this->render('front-office/home/comment.ca.marche.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
