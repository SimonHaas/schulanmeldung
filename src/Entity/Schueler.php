<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="schueler")
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
     * @ORM\OneToOne(targetEntity="App\Entity\Registrierung", mappedBy="schueler", cascade={"persist", "remove"})
     */
    private $registrierung;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Ausbildung", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $ausbildung;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FluechtlingDaten", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $fluechtlingInfo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UmschuelerDaten", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $umschuelerInfo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FluechtlingDaten", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $fluechtlingDaten;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UmschuelerDaten", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $umschuelerDaten;

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

    public function getRegistrierung(): ?Registrierung
    {
        return $this->registrierung;
    }

    public function setRegistrierung(Registrierung $registrierung): self
    {
        $this->registrierung = $registrierung;

        // set the owning side of the relation if necessary
        if ($this !== $registrierung->getSchueler()) {
            $registrierung->setSchueler($this);
        }

        return $this;
    }

    public function getAusbildung(): ?Ausbildung
    {
        return $this->ausbildung;
    }

    public function setAusbildung(?Ausbildung $ausbildung): self
    {
        $this->ausbildung = $ausbildung;

        return $this;
    }

    public function getFluechtlingDaten(): ?FluechtlingDaten
    {
        return $this->fluechtlingDaten;
    }

    public function setFluechtlingDaten(?FluechtlingDaten $fluechtlingDaten): self
    {
        $this->fluechtlingDaten = $fluechtlingDaten;

        return $this;
    }

    public function getUmschuelerDaten(): ?UmschuelerDaten
    {
        return $this->umschuelerDaten;
    }

    public function setUmschuelerDaten(?UmschuelerDaten $umschuelerDaten): self
    {
        $this->umschuelerDaten = $umschuelerDaten;

        return $this;
    }

}
