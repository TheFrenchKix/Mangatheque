<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\MangaRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(MangaRepository $mangaRepository, SerieRepository $serieRepository, CategorieRepository $categorieRepository): Response
    {
        $series = $serieRepository->findAll();
        $mangas = $mangaRepository->findBy(array(), array('Serie' => 'ASC'));
        $categs = $categorieRepository->findAll();

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'mangas' => $mangas,
            'series' => $series,
            'categories' => $categs
        ]);
    }
}
