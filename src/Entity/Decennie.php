<?php

namespace App\Entity;

use App\Repository\DecennieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DecennieRepository::class)]
class Decennie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $anneeDecennie = null;

    #[ORM\OneToMany(mappedBy: 'decennie', targetEntity: annee::class)]
    private Collection $anneesDecennie;

    public function __construct()
    {
        $this->anneesDecennie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeDecennie(): ?int
    {
        return $this->anneeDecennie;
    }

    public function setAnneeDecennie(int $anneeDecennie): self
    {
        $this->anneeDecennie = $anneeDecennie;

        return $this;
    }

    /**
     * @return Collection<int, annee>
     */
    public function getAnneesDecennie(): Collection
    {
        return $this->anneesDecennie;
    }

    public function addAnneesDecennie(annee $anneesDecennie): self
    {
        if (!$this->anneesDecennie->contains($anneesDecennie)) {
            $this->anneesDecennie->add($anneesDecennie);
            $anneesDecennie->setDecennie($this);
        }

        return $this;
    }

    public function removeAnneesDecennie(annee $anneesDecennie): self
    {
        if ($this->anneesDecennie->removeElement($anneesDecennie)) {
            // set the owning side to null (unless already changed)
            if ($anneesDecennie->getDecennie() === $this) {
                $anneesDecennie->setDecennie(null);
            }
        }

        return $this;
    }
}
