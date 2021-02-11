<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditeurRepository::class)
 */
class Editeur
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
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="editeur")
     */
    private $Serie;

    public function __construct()
    {
        $this->Serie = new ArrayCollection();
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

    /**
     * @return Collection|Serie[]
     */
    public function getSerie(): Collection
    {
        return $this->Serie;
    }

    public function addSerie(Serie $serie): self
    {
        if (!$this->Serie->contains($serie)) {
            $this->Serie[] = $serie;
            $serie->setEditeur($this);
        }

        return $this;
    }

    public function removeSerie(Serie $serie): self
    {
        if ($this->Serie->removeElement($serie)) {
            // set the owning side to null (unless already changed)
            if ($serie->getEditeur() === $this) {
                $serie->setEditeur(null);
            }
        }

        return $this;
    }
}
