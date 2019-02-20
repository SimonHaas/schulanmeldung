<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchuelerRepository")
 */
class Schueler
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
    private $vorname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nachname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rufname;

    /**
     * @ORM\Column(type="date")
     */
    private $geburtsdatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geburtsort;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kontaktperson", mappedBy="schueler", orphanRemoval=true)
     */
    private $kontaktpersonen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schulbesuch", mappedBy="schueler", orphanRemoval=true)
     */
    private $schulbesuche;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Beruf", inversedBy="schueler")
     */
    private $beruf;

    public function __construct()
    {
        $this->kontaktpersonen = new ArrayCollection();
        $this->schulbesuche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): self
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname): self
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getRufname(): ?string
    {
        return $this->rufname;
    }

    public function setRufname(string $rufname): self
    {
        $this->rufname = $rufname;

        return $this;
    }

    public function getGeburtsdatum(): ?\DateTimeInterface
    {
        return $this->geburtsdatum;
    }

    public function setGeburtsdatum(\DateTimeInterface $geburtsdatum): self
    {
        $this->geburtsdatum = $geburtsdatum;

        return $this;
    }

    public function getGeburtsort(): ?string
    {
        return $this->geburtsort;
    }

    public function setGeburtsort(string $geburtsort): self
    {
        $this->geburtsort = $geburtsort;

        return $this;
    }

    /**
     * @return Collection|Kontaktperson[]
     */
    public function getKontaktpersonen(): Collection
    {
        return $this->kontaktpersonen;
    }

    public function addKontaktperson(Kontaktperson $kontaktperson): self
    {
        if (!$this->kontaktpersonen->contains($kontaktperson)) {
            $this->kontaktpersonen[] = $kontaktperson;
            $kontaktperson->setSchueler($this);
        }

        return $this;
    }

    public function removeKontaktperson(Kontaktperson $kontaktperson): self
    {
        if ($this->kontaktpersonen->contains($kontaktperson)) {
            $this->kontaktpersonen->removeElement($kontaktperson);
            // set the owning side to null (unless already changed)
            if ($kontaktperson->getSchueler() === $this) {
                $kontaktperson->setSchueler(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Schulbesuch[]
     */
    public function getSchulbesuche(): Collection
    {
        return $this->schulbesuche;
    }

    public function addSchulbesuche(Schulbesuch $schulbesuche): self
    {
        if (!$this->schulbesuche->contains($schulbesuche)) {
            $this->schulbesuche[] = $schulbesuche;
            $schulbesuche->setSchueler($this);
        }

        return $this;
    }

    public function removeSchulbesuche(Schulbesuch $schulbesuche): self
    {
        if ($this->schulbesuche->contains($schulbesuche)) {
            $this->schulbesuche->removeElement($schulbesuche);
            // set the owning side to null (unless already changed)
            if ($schulbesuche->getSchueler() === $this) {
                $schulbesuche->setSchueler(null);
            }
        }

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
