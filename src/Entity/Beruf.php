<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
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
    private $kurzbezeichnung;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bezeichnung;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $klasse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raum;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ersterSchultag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abNr;

    /**
     * @ORM\Column(type="integer")
     */
    private $abGefuehrt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kammer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKurzbezeichnung(): ?string
    {
        return $this->kurzbezeichnung;
    }

    public function setKurzbezeichnung(string $kurzbezeichnung): self
    {
        $this->kurzbezeichnung = $kurzbezeichnung;

        return $this;
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

    public function getKlasse(): ?string
    {
        return $this->klasse;
    }

    public function setKlasse(?string $klasse): self
    {
        $this->klasse = $klasse;

        return $this;
    }

    public function getRaum(): ?string
    {
        return $this->raum;
    }

    public function setRaum(?string $raum): self
    {
        $this->raum = $raum;

        return $this;
    }

    public function getErsterSchultag(): ?\DateTimeInterface
    {
        return $this->ersterSchultag;
    }

    public function setErsterSchultag(?\DateTimeInterface $ersterSchultag): self
    {
        $this->ersterSchultag = $ersterSchultag;

        return $this;
    }

    public function getAbNr(): ?string
    {
        return $this->abNr;
    }

    public function setAbNr(string $abNr): self
    {
        $this->abNr = $abNr;

        return $this;
    }

    public function getAbGefuehrt(): ?int
    {
        return $this->abGefuehrt;
    }

    public function setAbGefuehrt(int $abGefuehrt): self
    {
        $this->abGefuehrt = $abGefuehrt;

        return $this;
    }

    public function getKammer(): ?string
    {
        return $this->kammer;
    }

    public function setKammer(?string $kammer): self
    {
        $this->kammer = $kammer;

        return $this;
    }
}
