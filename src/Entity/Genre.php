<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomGenre = null;

    #[ORM\ManyToMany(targetEntity: Groupe::class, mappedBy: 'genre')]
    private Collection $groupeGenre;

    #[ORM\ManyToMany(targetEntity: Instrument::class, mappedBy: 'genreInstrument')]
    private Collection $instruments;

    public function __construct()
    {
        $this->groupeGenre = new ArrayCollection();
        $this->instruments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGenre(): ?string
    {
        return $this->nomGenre;
    }

    public function setNomGenre(string $nomGenre): self
    {
        $this->nomGenre = $nomGenre;

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getGroupeGenre(): Collection
    {
        return $this->groupeGenre;
    }

    public function addGroupeGenre(Groupe $groupeGenre): self
    {
        if (!$this->groupeGenre->contains($groupeGenre)) {
            $this->groupeGenre->add($groupeGenre);
            $groupeGenre->addGenre($this);
        }

        return $this;
    }

    public function removeGroupeGenre(Groupe $groupeGenre): self
    {
        if ($this->groupeGenre->removeElement($groupeGenre)) {
            $groupeGenre->removeGenre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Instrument>
     */
    public function getInstruments(): Collection
    {
        return $this->instruments;
    }

    public function addInstrument(Instrument $instrument): self
    {
        if (!$this->instruments->contains($instrument)) {
            $this->instruments->add($instrument);
            $instrument->addGenreInstrument($this);
        }

        return $this;
    }

    public function removeInstrument(Instrument $instrument): self
    {
        if ($this->instruments->removeElement($instrument)) {
            $instrument->removeGenreInstrument($this);
        }

        return $this;
    }
}
