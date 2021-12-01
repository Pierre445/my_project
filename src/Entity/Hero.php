<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\ORM\Mapping as ORM;
use  App\Entity\Fan;

/**
 * @ORM\Entity(repositoryClass=HeroRepository::class)
 */
class Hero
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
    private $prenom;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $puissance;

    /**
     * @ORM\OneToOne(targetEntity=Mechant::class,inversedBy="rival")
     */
    private $rival;

    /**
     * @ORM\OneToMany(targetEntity=Fan::class,mappedBy="hero")
     */
    private $fans;

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

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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
    public function __toString()
    {
        return $this->pseudo."(". $this->puissance .")";
    }

    /**
     * Get the value of rival
     */
    public function getRival()
    {
        return $this->rival;
    }

    /**
     * Set the value of rival
     */
    public function setRival($rival): self
    {
        $this->rival = $rival;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

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
}
