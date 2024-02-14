<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'partenaire', targetEntity: event::class)]
    private Collection $event;

    #[ORM\ManyToOne(inversedBy: 'partenaires')]
    private ?Contratpartenariat $contrat = null;

    

    public function __construct()
    {
        $this->event = new ArrayCollection();
    }

    

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

    /**
     * @return Collection<int, event>
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(event $event): static
    {
        if (!$this->event->contains($event)) {
            $this->event->add($event);
            $event->setPartenaire($this);
        }

        return $this;
    }

    public function removeEvent(event $event): static
    {
        if ($this->event->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getPartenaire() === $this) {
                $event->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getContrat(): ?Contratpartenariat
    {
        return $this->contrat;
    }

    public function setContrat(?Contratpartenariat $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }

    

    
}
