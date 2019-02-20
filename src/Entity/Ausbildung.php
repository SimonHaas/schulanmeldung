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
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Betrieb", inversedBy="ausbildungen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $betrieb;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Betrieb")
     * @ORM\JoinColumn(nullable=false)
     */
    private $betriebId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Beruf")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beruf;

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

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

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

    public function getBetriebId(): ?Betrieb
    {
        return $this->betriebId;
    }

    public function setBetriebId(?Betrieb $betriebId): self
    {
        $this->betriebId = $betriebId;

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
}