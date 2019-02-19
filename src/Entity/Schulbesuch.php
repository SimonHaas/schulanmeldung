<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchulbesuchRepository")
 */
class Schulbesuch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schueler", inversedBy="schulbesuche")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schueler;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schule")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schule;

    /**
     * @ORM\Column(type="date")
     */
    private $eintritt;

    /**
     * @ORM\Column(type="date")
     */
    private $austritt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchule(): ?Schule
    {
        return $this->schule;
    }

    public function setSchule(?Schule $schule): self
    {
        $this->schule = $schule;

        return $this;
    }

    public function getEintritt(): ?\DateTimeInterface
    {
        return $this->eintritt;
    }

    public function setEintritt(\DateTimeInterface $eintritt): self
    {
        $this->eintritt = $eintritt;

        return $this;
    }

    public function getAustritt(): ?\DateTimeInterface
    {
        return $this->austritt;
    }

    public function setAustritt(\DateTimeInterface $austritt): self
    {
        $this->austritt = $austritt;

        return $this;
    }

    public function getSchueler(): ?Schueler
    {
        return $this->schueler;
    }

    public function setSchueler(?Schueler $schueler): self
    {
        $this->schueler = $schueler;

        return $this;
    }
}
