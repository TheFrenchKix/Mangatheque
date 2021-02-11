<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MangaRepository::class)
 */
class Manga
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPages;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixManga;

    /**
     * @ORM\Column(type="text")
     */
    private $DescriptionManga;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cheminImage;

    /**
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="mangas")
     */
    private $Serie;

    /**
     * @ORM\Column(type="date")
     */
    private $dateParution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    public function getPrixManga(): ?float
    {
        return $this->PrixManga;
    }

    public function setPrixManga(float $PrixManga): self
    {
        $this->PrixManga = $PrixManga;

        return $this;
    }

    public function getDescriptionManga(): ?string
    {
        return $this->DescriptionManga;
    }

    public function setDescriptionManga(string $DescriptionManga): self
    {
        $this->DescriptionManga = $DescriptionManga;

        return $this;
    }

    public function getNumSerie(): ?int
    {
        return $this->numSerie;
    }

    public function setNumSerie(int $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getCheminImage(): ?string
    {
        return $this->cheminImage;
    }

    public function setCheminImage(string $cheminImage): self
    {
        $this->cheminImage = $cheminImage;

        return $this;
    }

    public function getSerie(): ?Serie
    {
        return $this->Serie;
    }

    public function setSerie(?Serie $Serie): self
    {
        $this->Serie = $Serie;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

        return $this;
    }
}