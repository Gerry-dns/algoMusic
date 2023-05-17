<?php

namespace App\Entity;

use App\Repository\NoteUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteUtilisateurRepository::class)]
class NoteUtilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $noteAttribueeAGroupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteAttribueeAGroupe(): ?int
    {
        return $this->noteAttribueeAGroupe;
    }

    public function setNoteAttribueeAGroupe(?int $noteAttribueeAGroupe): self
    {
        $this->noteAttribueeAGroupe = $noteAttribueeAGroupe;

        return $this;
    }
}
