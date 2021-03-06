<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="berufsdaten")
 * @ORM\Entity(repositoryClass="App\Repository\BerufRepository")
 */
class Beruf
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bezeichnung;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $klasse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBezeichnung(): ?string
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung(string $bezeichnung): self
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function __toString()
    {
        return $this->getBezeichnung();
    }

    public function getKlasse(): ?string
    {
        return $this->klasse;
    }

    public function setKlasse(?string $klasse): self
    {
        $this->klasse = $klasse;

        return $this;
    }

    public function getNummer(): ?int
    {
        return $this->nummer;
    }

    public function setNummer(int $nummer): self
    {
        $this->nummer = $nummer;

        return $this;
    }
}
