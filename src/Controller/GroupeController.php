<?php

namespace App\Controller;

use App\Repository\GroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupeController extends AbstractController
{
    #[Route('/groupe', name: 'groupe')]
    public function index(GroupeRepository $repository): Response
    {
        return $this->render('groupe/index.html.twig', [
            'groupes' => $repository->findAll()
        ]);
    }
}
