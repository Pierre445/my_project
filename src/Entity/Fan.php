<?php

namespace App\Entity;

use App\Repository\FanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FanRepository::class)
 */
class Fan
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
     * @ORM\Column(type="string", length=255)
     */
    private $puissance;

    /**
     * @ORM\ManyToOne(targetEntity=Hero::class,inversedBy="fans")
     */
    private $hero;

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



    public function getPuissance(): ?string
    {
        return $this->puissance;
    }

    public function setPuissance(string $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Get the value of fans
     */
    public function getFans()
    {
        return $this->fans;
    }

    /**
     * Set the value of fans
     */
    public function setFans($fans): self
    {
        $this->fans = $fans;

        return $this;
    }

    /**
     * Get the value of hero
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     */
    public function setHero($hero): self
    {
        $this->hero = $hero;

        return $this;
    }
    public function __toString()
    {
        return $this->nom."(". $this->puissance .")";
    }
}
