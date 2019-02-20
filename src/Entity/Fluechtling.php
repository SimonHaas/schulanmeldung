<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fluechtling")
 * @ORM\Entity(repositoryClass="App\Repository\FluechtlingRepository")
 */
class Fluechtling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deutschKenntnis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anmeldeStelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ansprechPartner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeutschKenntnis(): ?bool
    {
        return $this->deutschKenntnis;
    }

    public function setDeutschKenntnis(bool $deutschKenntnis): self
    {
        $this->deutschKenntnis = $deutschKenntnis;

        return $this;
    }

    public function getAnmeldeStelle(): ?string
    {
        return $this->anmeldeStelle;
    }

    public function setAnmeldeStelle(string $anmeldeStelle): self
    {
        $this->anmeldeStelle = $anmeldeStelle;

        return $this;
    }

    public function getAnsprechPartner(): ?string
    {
        return $this->ansprechPartner;
    }

    public function setAnsprechPartner(string $ansprechPartner): self
    {
        $this->ansprechPartner = $ansprechPartner;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }
}
