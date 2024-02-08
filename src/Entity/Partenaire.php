<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireRepository::class)]
class Partenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomP = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column]
    private ?float $don = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?contratpartenariat $partenaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomP(): ?string
    {
        return $this->nomP;
    }

    public function setNomP(string $nomP): static
    {
        $this->nomP = $nomP;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDon(): ?float
    {
        return $this->don;
    }

    public function setDon(float $don): static
    {
        $this->don = $don;

        return $this;
    }

    public function getPartenaire(): ?contratpartenariat
    {
        return $this->partenaire;
    }

    public function setPartenaire(?contratpartenariat $partenaire): static
    {
        $this->partenaire = $partenaire;

        return $this;
    }
}
