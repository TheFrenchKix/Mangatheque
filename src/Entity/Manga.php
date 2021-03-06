<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=MangaRepository::class)
 * @Vich\Uploadable
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
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="mangas")
     */
    private $Serie;

    /**
     * @ORM\Column(type="date")
     */
    private $dateParution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="image", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="manga")
     */
    private $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->Serie->getNom() . " | Tome " . $this->numSerie;
    }

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $cheminImage): self
    {
        $this->image = $cheminImage;

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

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile): void
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setManga($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getManga() === $this) {
                $commentaire->setManga(null);
            }
        }

        return $this;
    }
}
