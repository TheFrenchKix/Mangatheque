<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Manga;
use App\Entity\Utilisateur;
use App\Repository\CommentaireRepository;
use App\Repository\MangaRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
            'series' => $series,
        ]);
    }

    /**
     * @Route("/manga-{id}", name="show_Manga")
     * @param int $id
     */
    public function showManga(int $id, MangaRepository $mangaRepository, CommentaireRepository $commentaireRepository)
    {
        $manga = $mangaRepository->find($id);
        $commentaires = $commentaireRepository->findAll();

        return $this->render(
            'manga/manga.html.twig', [
            'manga' => $manga,
            'commentaires' => $commentaires
        ]);
    }

    /**
     * @Route("/addComment-{id}", name="add_MangaComment")
     * @param int $id
     */
    public function addComment(int $id, MangaRepository $mangaRepository, CommentaireRepository $commentaireRepository)
    {
        $manga = $mangaRepository->find($id);
        $commentaires = $commentaireRepository->findAll();
        $utilisateur = $this->getUser();

        $commentaire = new Commentaire();

        $commentaire->setLibelle($_POST['lib']);
        $commentaire->setNote($_POST['note']);
        $commentaire->setDate(new \DateTime());
        $commentaire->setManga($manga);
        $commentaire->setUtilisateur($utilisateur);

        $em = $this->getDoctrine()->getManager();

        $em->persist($commentaire);
        $em->flush();

        return $this->redirectToRoute('show_Manga',array(
            'id' => $id
        ));
    }
}