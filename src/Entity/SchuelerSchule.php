<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchuelerSchuleRepository")
 */
class SchuelerSchule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    //TODO Doctrine Relationship-Type verwenden
    /**
     * @ORM\Column(type="integer")
     */
    private $schule;

    /**
     * @ORM\Column(type="integer")
     */
    private $schueler;

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

    public function getSchule(): ?int
    {
        return $this->schule;
    }

    public function setSchule(int $schule): self
    {
        $this->schule = $schule;

        return $this;
    }

    public function getSchueler(): ?int
    {
        return $this->schueler;
    }

    public function setSchueler(int $schueler): self
    {
        $this->schueler = $schueler;

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
}
