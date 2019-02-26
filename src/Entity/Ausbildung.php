<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ausbildung")
 * @ORM\Entity(repositoryClass="App\Repository\AusbildungRepository")
 */
class Ausbildung
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $beginn;

    /**
     * @ORM\Column(type="date")
     */
    private $ende;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Beruf", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $beruf;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Schueler", mappedBy="ausbildung", cascade={"persist", "remove"})
     */
    private $schueler;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Betrieb", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $betrieb;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginn(): ?\DateTimeInterface
    {
        return $this->beginn;
    }

    public function setBeginn(\DateTimeInterface $beginn): self
    {
        $this->beginn = $beginn;

        return $this;
    }

    public function getEnde(): ?\DateTimeInterface
    {
        return $this->ende;
    }

    public function setEnde(\DateTimeInterface $ende): self
    {
        $this->ende = $ende;

        return $this;
    }

    public function getBeruf(): ?Beruf
    {
        return $this->beruf;
    }

    public function setBeruf(?Beruf $beruf): self
    {
        $this->beruf = $beruf;

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
        $newAusbildung = $schueler === null ? null : $this;
        if ($newAusbildung !== $schueler->getAusbildung()) {
            $schueler->setAusbildung($newAusbildung);
        }

        return $this;
    }

    public function getBetrieb(): ?Betrieb
    {
        return $this->betrieb;
    }

    public function setBetrieb(?Betrieb $betrieb): self
    {
        $this->betrieb = $betrieb;

        return $this;
    }
}
