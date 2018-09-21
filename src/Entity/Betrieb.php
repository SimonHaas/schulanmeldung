<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetriebRepository")
 */
class Betrieb
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $schluessel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plz;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $strasse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefon1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefon2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefon3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $gemeinde;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bbig;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchluessel(): ?string
    {
        return $this->schluessel;
    }

    public function setSchluessel(?string $schluessel): self
    {
        $this->schluessel = $schluessel;

        return $this;
    }

    public function getName1(): ?string
    {
        return $this->name1;
    }

    public function setName1(?string $name1): self
    {
        $this->name1 = $name1;

        return $this;
    }

    public function getName2(): ?string
    {
        return $this->name2;
    }

    public function setName2(?string $name2): self
    {
        $this->name2 = $name2;

        return $this;
    }

    public function getName3(): ?string
    {
        return $this->name3;
    }

    public function setName3(?string $name3): self
    {
        $this->name3 = $name3;

        return $this;
    }

    public function getPlz(): ?int
    {
        return $this->plz;
    }

    public function setPlz(?int $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(?string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(?string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getTelefon1(): ?string
    {
        return $this->telefon1;
    }

    public function setTelefon1(?string $telefon1): self
    {
        $this->telefon1 = $telefon1;

        return $this;
    }

    public function getTelefon2(): ?string
    {
        return $this->telefon2;
    }

    public function setTelefon2(?string $telefon2): self
    {
        $this->telefon2 = $telefon2;

        return $this;
    }

    public function getTelefon3(): ?string
    {
        return $this->telefon3;
    }

    public function setTelefon3(?string $telefon3): self
    {
        $this->telefon3 = $telefon3;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGemeinde(): ?string
    {
        return $this->gemeinde;
    }

    public function setGemeinde(?string $gemeinde): self
    {
        $this->gemeinde = $gemeinde;

        return $this;
    }

    public function getBbig(): ?string
    {
        return $this->bbig;
    }

    public function setBbig(?string $bbig): self
    {
        $this->bbig = $bbig;

        return $this;
    }
}
