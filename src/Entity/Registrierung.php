<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="registrierung")
 * @ORM\Entity(repositoryClass="App\Repository\RegistrierungRepository")
 */
class Registrierung
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datum;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mitteilung;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wohnheim;

    /**
     * @ORM\Column(type="date")
     */
    private $eintrittAm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\Column(type="string",length=4)
     */
    private $typ;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Schueler", inversedBy="registrierung", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $schueler;

    /**
     * @ORM\Column(type="boolean")
     */
    private $datenschutz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getMitteilung(): ?string
    {
        return $this->mitteilung;
    }

    public function setMitteilung(?string $mitteilung): self
    {
        $this->mitteilung = $mitteilung;

        return $this;
    }

    public function getWohnheim(): ?bool
    {
        return $this->wohnheim;
    }

    public function setWohnheim(bool $wohnheim): self
    {
        $this->wohnheim = $wohnheim;

        return $this;
    }

    public function getEintrittAm(): ?\DateTimeInterface
    {
        return $this->eintrittAm;
    }

    public function setEintrittAm(\DateTimeInterface $eintrittAm): self
    {
        $this->eintrittAm = $eintrittAm;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): self
    {
        $this->typ = $typ;

        return $this;
    }

    public function getSchueler(): ?Schueler
    {
        return $this->schueler;
    }

    public function setSchueler(Schueler $schueler): self
    {
        $this->schueler = $schueler;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getId();
    }

    public function getDatenschutz(): ?bool
    {
        return $this->datenschutz;
    }

    public function setDatenschutz(bool $datenschutz): self
    {
        $this->datenschutz = $datenschutz;

        return $this;
    }
}
