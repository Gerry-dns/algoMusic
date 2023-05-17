<?php

namespace App\Entity;

use App\Repository\HistoriqueUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueUtilisateurRepository::class)]
class HistoriqueUtilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $groupeEcoute = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupeEcoute(): ?string
    {
        return $this->groupeEcoute;
    }

    public function setGroupeEcoute(?string $groupeEcoute): self
    {
        $this->groupeEcoute = $groupeEcoute;

        return $this;
    }
}
