<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="schuldaten")
 * @ORM\Entity(repositoryClass="App\Repository\SchuleRepository")
 */
class Schule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $strasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $plz;

    /**
     * @ORM\Column(type="boolean")
     */
    private $istVerifiziert;

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

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(string $art): self
    {
        $this->art = $art;

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

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * @param mixed $nummer
     * @return Schule
     */
    public function setNummer($nummer)
    {
        $this->nummer = $nummer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNummer()
    {
        return $this->nummer;
    }

    public function getIstVerifiziert(): ?bool
    {
        return $this->istVerifiziert;
    }

    public function setIstVerifiziert(bool $istVerifiziert): self
    {
        $this->istVerifiziert = $istVerifiziert;

        return $this;
    }

    public function __toString()
    {
        return $this->getName() . ', ' . $this->getStrasse();
    }
}
