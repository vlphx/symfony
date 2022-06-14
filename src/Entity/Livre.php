<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $Titre;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="livres", cascade={"persist"})
     */
    private $Auteur;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDePublication;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->Auteur;
    }

    public function setAuteur(?Auteur $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getDateDePublication(): ?\DateTimeInterface
    {
        return $this->DateDePublication;
    }

    public function setDateDePublication(\DateTimeInterface $DateDePublication): self
    {
        $this->DateDePublication = $DateDePublication;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(?string $Resume): self
    {
        $this->Resume = $Resume;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(?string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }
}
