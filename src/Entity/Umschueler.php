<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="umschueler")
 * @ORM\Entity(repositoryClass="App\Repository\UmschuelerRepository")
 */
class Umschueler
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
    private $traeger;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $traegerSitz;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $foerdererNr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraeger(): ?string
    {
        return $this->traeger;
    }

    public function setTraeger(string $traeger): self
    {
        $this->traeger = $traeger;

        return $this;
    }

    public function getTraegerSitz(): ?string
    {
        return $this->traegerSitz;
    }

    public function setTraegerSitz(string $traegerSitz): self
    {
        $this->traegerSitz = $traegerSitz;

        return $this;
    }

    public function getFoerdererNr(): ?int
    {
        return $this->foerdererNr;
    }

    public function setFoerdererNr(?int $foerdererNr): self
    {
        $this->foerdererNr = $foerdererNr;

        return $this;
    }
}
