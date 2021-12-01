<?php

namespace App\Entity;

use App\Repository\MechantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MechantRepository::class)
 */
class Mechant
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
    private $pseudo;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissance;

    /**
     * @ORM\OneToOne(targetEntity=Hero::class,mappedBy="rival")
     */
    private $rival;

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

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
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
}
