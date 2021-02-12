<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\OneToMany(targetEntity=Manga::class, mappedBy="Serie")
     */
    private $mangas;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="Serie")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Editeur::class, inversedBy="Serie")
     */
    private $editeur;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="Serie")
     */
    private $dessinateur;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="Serie")
     */
    private $scenariste;

    public function __construct()
    {
        $this->mangas = new ArrayCollection();
        $this->personnes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection|Manga[]
     */
    public function getMangas(): Collection
    {
        return $this->mangas;
    }

    public function addManga(Manga $manga): self
    {
        if (!$this->mangas->contains($manga)) {
            $this->mangas[] = $manga;
            $manga->setSerie($this);
        }

        return $this;
    }

    public function removeManga(Manga $manga): self
    {
        if ($this->mangas->removeElement($manga)) {
            // set the owning side to null (unless already changed)
            if ($manga->getSerie() === $this) {
                $manga->setSerie(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getDessinateur(): ?Personne
    {
        return $this->dessinateur;
    }

    public function setDessinateur(?Personne $dessinateur): self
    {
        $this->dessinateur = $dessinateur;

        return $this;
    }

    public function getScenariste(): ?Personne
    {
        return $this->scenariste;
    }

    public function setScenariste(?Personne $scenariste): self
    {
        $this->scenariste = $scenariste;

        return $this;
    }
}
