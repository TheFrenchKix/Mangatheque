<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
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
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="personne")
     */
    private $Serie;

    public function __construct()
    {
        $this->Serie = new ArrayCollection();
        $this->personnes = new ArrayCollection();
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

    public function addSerieSenariste(Serie $serie): self
    {
        if (!$this->Serie->contains($serie)) {
            $this->Serie[] = $serie;
            $serie->setScenariste($this);
        }

        return $this;
    }

    public function addSerieDessinateur(Serie $serie): self
    {
        if (!$this->Serie->contains($serie)) {
            $this->Serie[] = $serie;
            $serie->setDessinateur($this);
        }

        return $this;
    }

    public function removeSerieDessinateur(Serie $serie): self
    {
        if ($this->Serie->removeElement($serie)) {
            // set the owning side to null (unless already changed)
            if ($serie->getDessinateur() === $this) {
                $serie->setDessinateur(null);
            }
        }

        return $this;
    }

    public function removeSerieScenariste(Serie $serie): self
    {
        if ($this->Serie->removeElement($serie)) {
            // set the owning side to null (unless already changed)
            if ($serie->getScenariste() === $this) {
                $serie->setScenariste(null);
            }
        }

        return $this;
    }
}
