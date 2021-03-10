<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Repository\MangaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MangaRepository $mangaRepository): Response
    {
        $mangas = $mangaRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'mangas' => $mangas
        ]);
    }
}
