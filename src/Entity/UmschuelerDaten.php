<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="umschuelerdaten")
 * @ORM\Entity(repositoryClass="App\Repository\UmschuelerDatenRepository")
 */
class UmschuelerDaten
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Schueler", mappedBy="umschuelerDaten", cascade={"persist", "remove"})
     */
    private $schueler;

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

    public function getSchueler(): ?Schueler
    {
        return $this->schueler;
    }

    public function setSchueler(?Schueler $schueler): self
    {
        $this->schueler = $schueler;

        // set (or unset) the owning side of the relation if necessary
        $newUmschuelerDaten = $schueler === null ? null : $this;
        if ($newUmschuelerDaten !== $schueler->getUmschuelerDaten()) {
            $schueler->setUmschuelerDaten($newUmschuelerDaten);
        }

        return $this;
    }

}
