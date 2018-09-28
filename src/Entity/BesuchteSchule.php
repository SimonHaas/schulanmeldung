<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BesuchteSchuleRepository")
 */
class BesuchteSchule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Schueler", inversedBy="$besuchteSchulen")
     * @ORM\JoinColumn(name="schueler", referencedColumnName="id")
     */
    private $schuelerId;

    /**
     * @ORM\Column(type="date")
     */
    private $eintritt;

    /**
     * @ORM\Column(type="date")
     */
    private $austritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchuelerId(): ?int
    {
        return $this->schuelerId;
    }

    public function setSchuelerId(int $schuelerId): self
    {
        $this->schuelerId = $schuelerId;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }
}
