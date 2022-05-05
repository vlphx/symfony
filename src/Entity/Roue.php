<?php

namespace App\Entity;

use App\Repository\RoueRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=RoueRepository::class)
 */
class Roue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Range(min=10, minMessage="Le diamètre doit faire au moins 10 cm.", max=20, maxMessage="Le diamètre doit faire au maximum 20cm.")
     */
    private $diametre;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(?float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }


}
