<?php

namespace App\Controller;

use App\Repository\EditeurRepository;
use App\Repository\MangaRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditeurController extends AbstractController
{
    /**
     * @Route("/editeur", name="editeur")
     */
    public function index(EditeurRepository $editeurRepository, MangaRepository $mangaRepository): Response
    {
        $mangas = $mangaRepository->findBy(array(), array('Serie' => 'ASC'));
        $editeurs = $editeurRepository->findAll();

        return $this->render('editeur/index.html.twig', [
            'controller_name' => 'EditeurController',
            'mangas' => $mangas,
            'editeurs' => $editeurs,
        ]);
    }
}