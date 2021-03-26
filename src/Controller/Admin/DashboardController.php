<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Editeur;
use App\Entity\Manga;
use App\Entity\Personne;
use App\Entity\Serie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render("Bundle/EasyAdminBundle/welcome.html.twig");
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TPMangatheque');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Manga', 'fas fa-book', Manga::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', Commentaire::class);
        yield MenuItem::linkToCrud('Serie', 'fas fa-play', Serie::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-tags', Categorie::class);
        yield MenuItem::linkToCrud('Personne', 'far fa-address-card', Personne::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-user-edit', Editeur::class);
    }
}
