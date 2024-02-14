<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column]
    private ?int $Phone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

   

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Allocation::class)]
    private Collection $allocations;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: CategoryE::class)]
    private Collection $categoryE;

    #[ORM\ManyToOne(inversedBy: 'event')]
    private ?Partenaire $partenaire = null;

    #[ORM\Column(length: 255)]
    private ?string $Category = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Lieu $lieu = null;

    

    public function __construct()
    {
        $this->allocations = new ArrayCollection();
        $this->categoryE = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }




    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Allocation>
     */
    public function getAllocations(): Collection
    {
        return $this->allocations;
    }

    public function addAllocation(Allocation $allocation): static
    {
        if (!$this->allocations->contains($allocation)) {
            $this->allocations->add($allocation);
            $allocation->setEvent($this);
        }

        return $this;
    }

    public function removeAllocation(Allocation $allocation): static
    {
        if ($this->allocations->removeElement($allocation)) {
            // set the owning side to null (unless already changed)
            if ($allocation->getEvent() === $this) {
                $allocation->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategoryE>
     */
    public function getCategoryE(): Collection
    {
        return $this->categoryE;
    }

    public function addCategoryE(CategoryE $categoryE): static
    {
        if (!$this->categoryE->contains($categoryE)) {
            $this->categoryE->add($categoryE);
            $categoryE->setEvent($this);
        }

        return $this;
    }

    public function removeCategoryE(CategoryE $categoryE): static
    {
        if ($this->categoryE->removeElement($categoryE)) {
            // set the owning side to null (unless already changed)
            if ($categoryE->getEvent() === $this) {
                $categoryE->setEvent(null);
            }
        }

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): static
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }
}
