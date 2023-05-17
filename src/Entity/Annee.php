<?php

namespace App\Entity;

use App\Repository\AnneeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeRepository::class)]
class Annee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dataAnnee = null;

    #[ORM\ManyToOne(inversedBy: 'anneesDecennie')]
    private ?Decennie $decennie = null;

    #[ORM\ManyToMany(targetEntity: Groupe::class, mappedBy: 'groupeAnnee')]
    private Collection $groupes;

    public function __construct()
    {
        $this->groupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAnnee(): ?int
    {
        return $this->dataAnnee;
    }

    public function setDataAnnee(int $dataAnnee): self
    {
        $this->dataAnnee = $dataAnnee;

        return $this;
    }

    public function getDecennie(): ?Decennie
    {
        return $this->decennie;
    }

    public function setDecennie(?Decennie $decennie): self
    {
        $this->decennie = $decennie;

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes->add($groupe);
            $groupe->addGroupeAnnee($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeGroupeAnnee($this);
        }

        return $this;
    }
}
