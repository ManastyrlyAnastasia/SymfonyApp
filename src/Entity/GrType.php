<?php

namespace App\Entity;

use App\Repository\GrTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrTypeRepository::class)]
class GrType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $form_of_education = null;

    #[ORM\OneToMany(mappedBy: 'gr_type', targetEntity: Groups::class)]
    private Collection $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormOfEducation(): ?string
    {
        return $this->form_of_education;
    }

    public function setFormOfEducation(string $form_of_education): static
    {
        $this->form_of_education = $form_of_education;

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
            $group->setGrType($this);
        }

        return $this;
    }

    public function removeGroup(Groups $group): static
    {
        if ($this->groups->removeElement($group)) {
            // set the owning side to null (unless already changed)
            if ($group->getGrType() === $this) {
                $group->setGrType(null);
            }
        }

        return $this;
    }
}
