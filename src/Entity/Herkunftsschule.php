<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="herkunftsschulen")
 * @ORM\Entity(repositoryClass="App\Repository\HerkunftsschuleRepository")
 */
class Herkunftsschule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="HKS_NUMMER")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="HKS_NAME")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, name="HKS_STRASSE")
     */
    private $strasse;

    /**
     * @ORM\Column(type="integer", name="HKS_PLZ")
     */
    private $plz;

    /**
     * @ORM\Column(type="string", length=255, name="HKS_ORT")
     */
    private $ort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getPlz(): ?int
    {
        return $this->plz;
    }

    public function setPlz(int $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }
}
