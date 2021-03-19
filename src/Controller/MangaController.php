<?php

namespace App\Controller;

use App\Repository\MangaRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MangaController extends AbstractController
{
    /**
     * @Route("/mangas", name="mangas")
     */
    public function index(MangaRepository $mangaRepository, SerieRepository $serieRepository): Response
    {
        $series = $serieRepository->findAll();
        $mangas = $mangaRepository->findBy(array(), array('Serie' => 'ASC'));

        return $this->render('manga/index.html.twig', [
            'controller_name' => 'MangaController',
            'mangas' => $mangas,
            'series' => $series
        ]);
    }

    /**
     * @Route("/manga-{id}", name="show_Manga")
     * @param int $id
     */
    public function showManga(int $id, MangaRepository $mangaRepository)
    {
        $manga = $mangaRepository->find($id);

        return $this->render(
            'manga/manga.html.twig', [
            'manga' => $manga
        ]);
    }
}