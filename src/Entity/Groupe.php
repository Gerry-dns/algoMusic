<?php

namespace App\Entity;

use App\Entity\Genre;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomGroupe = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'groupeGenre')]
    private Collection $genre;

    #[ORM\ManyToMany(targetEntity: Instrument::class, inversedBy: 'groupes')]
    private Collection $groupeInstruments;

    #[ORM\ManyToMany(targetEntity: Annee::class, inversedBy: 'groupes')]
    private Collection $groupeAnnee;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->groupeInstruments = new ArrayCollection();
        $this->groupeAnnee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(string $nomGroupe): self
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    /**
     * @return Collection<int, genre>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre->add($genre);
        }

        return $this;
    }

    public function removeGenre(genre $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }

    /**
     * @return Collection<int, instrument>
     */
    public function getGroupeInstruments(): Collection
    {
        return $this->groupeInstruments;
    }

    public function addGroupeInstrument(Instrument $groupeInstrument): self
    {
        if (!$this->groupeInstruments->contains($groupeInstrument)) {
            $this->groupeInstruments->add($groupeInstrument);
        }

        return $this;
    }

    public function removeGroupeInstrument(Instrument $groupeInstrument): self
    {
        $this->groupeInstruments->removeElement($groupeInstrument);

        return $this;
    }

    /**
     * @return Collection<int, annee>
     */
    public function getGroupeAnnee(): Collection
    {
        return $this->groupeAnnee;
    }

    public function addGroupeAnnee(annee $groupeAnnee): self
    {
        if (!$this->groupeAnnee->contains($groupeAnnee)) {
            $this->groupeAnnee->add($groupeAnnee);
        }

        return $this;
    }

    public function removeGroupeAnnee(annee $groupeAnnee): self
    {
        $this->groupeAnnee->removeElement($groupeAnnee);

        return $this;
    }
}
