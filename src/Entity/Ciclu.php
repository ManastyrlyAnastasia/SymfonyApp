<?php

namespace App\Entity;

use App\Repository\CicluRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CicluRepository::class)]
class Ciclu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $ciclu = null;

    #[ORM\OneToMany(mappedBy: 'ciclu', targetEntity: Groups::class)]
    private Collection $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiclu(): ?string
    {
        return $this->ciclu;
    }

    public function setCiclu(string $ciclu): static
    {
        $this->ciclu = $ciclu;

        return $this;
    }

    /**
     * @return Collection<int, Groups>
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Groups $group): static
    {
        if (!$this->groups->contains($group)) {
            $this->groups->add($group);
            $group->setCiclu($this);
        }

        return $this;
    }

    public function removeGroup(Groups $group): static
    {
        if ($this->groups->removeElement($group)) {
            // set the owning side to null (unless already changed)
            if ($group->getCiclu() === $this) {
                $group->setCiclu(null);
            }
        }

        return $this;
    }
}
