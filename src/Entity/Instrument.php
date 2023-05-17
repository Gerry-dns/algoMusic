<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentRepository::class)]
class Instrument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomInstrument = null;

    #[ORM\ManyToMany(targetEntity: genre::class, inversedBy: 'instruments')]
    private Collection $genreInstrument;

    #[ORM\ManyToMany(targetEntity: Groupe::class, mappedBy: 'groupeInstruments')]
    private Collection $groupes;

    #[ORM\Column(nullable: true)]
    private ?int $typeInstrument = null;

    public function __construct()
    {
        $this->genreInstrument = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomInstrument(): ?string
    {
        return $this->nomInstrument;
    }

    public function setNomInstrument(string $nomInstrument): self
    {
        $this->nomInstrument = $nomInstrument;

        return $this;
    }

    /**
     * @return Collection<int, genre>
     */
    public function getGenreInstrument(): Collection
    {
        return $this->genreInstrument;
    }

    public function addGenreInstrument(genre $genreInstrument): self
    {
        if (!$this->genreInstrument->contains($genreInstrument)) {
            $this->genreInstrument->add($genreInstrument);
        }

        return $this;
    }

    public function removeGenreInstrument(genre $genreInstrument): self
    {
        $this->genreInstrument->removeElement($genreInstrument);

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
            $groupe->addGroupeInstrument($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeGroupeInstrument($this);
        }

        return $this;
    }

    public function getTypeInstrument(): ?int
    {
        return $this->typeInstrument;
    }

    public function setTypeInstrument(?int $typeInstrument): self
    {
        $this->typeInstrument = $typeInstrument;

        return $this;
    }
}
