<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $modele;

    /**
     * @ORM\OneToOne(targetEntity=Chassis::class, cascade={"persist", "remove"})
     */
    private $Chassis;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="Vehicule")
     */
    private $clients;

    /**
     * @ORM\ManyToMany(targetEntity=Roue::class,inversedBy="vehicules", cascade={"persist"})
     */
    private $Roues;

    /**
     * @ORM\ManyToOne(targetEntity=Couleur::class, inversedBy="vehicules")
     */
    private $Couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Moteur::class, inversedBy="vehicules", cascade={"persist"})
     */
    private $Moteur;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->Roues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getChassis(): ?Chassis
    {
        return $this->Chassis;
    }

    public function setChassis(?Chassis $Chassis): self
    {
        $this->Chassis = $Chassis;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setVehicule($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getVehicule() === $this) {
                $client->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Roue>
     */
    public function getRoues(): Collection
    {
        return $this->Roues;
    }

    public function addRoue(Roue $roue): self
    {
        if (!$this->Roues->contains($roue)) {
            $this->Roues[] = $roue;
        }

        return $this;
    }

    public function removeRoue(Roue $roue): self
    {
        $this->Roues->removeElement($roue);

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->Couleur;
    }

    public function setCouleur(?Couleur $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getMoteur(): ?Moteur
    {
        return $this->Moteur;
    }

    public function setMoteur(?Moteur $Moteur): self
    {
        $this->Moteur = $Moteur;

        return $this;
    }
}
