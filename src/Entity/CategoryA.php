<?php

namespace App\Entity;

use App\Repository\CategoryARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryARepository::class)]
class CategoryA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'Allocation')]
    private ?Allocation $allocation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAllocation(): ?Allocation
    {
        return $this->allocation;
    }

    public function setAllocation(?Allocation $allocation): static
    {
        $this->allocation = $allocation;

        return $this;
    }
}
