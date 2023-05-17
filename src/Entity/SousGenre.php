<?php

namespace App\Entity;

use App\Repository\SousGenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousGenreRepository::class)]
class SousGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSousGenre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSousGenre(): ?string
    {
        return $this->nomSousGenre;
    }

    public function setNomSousGenre(string $nomSousGenre): self
    {
        $this->nomSousGenre = $nomSousGenre;

        return $this;
    }
}
