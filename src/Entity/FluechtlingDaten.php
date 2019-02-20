<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fluechtlingdaten")
 * @ORM\Entity(repositoryClass="App\Repository\FluechtlingInfoRepository")
 */
class FluechtlingDaten
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Schueler", mappedBy="fluechtlingDaten", cascade={"persist", "remove"})
     */
    private $schueler;

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

    public function getSchueler(): ?Schueler
    {
        return $this->schueler;
    }

    public function setSchueler(?Schueler $schueler): self
    {
        $this->schueler = $schueler;

        // set (or unset) the owning side of the relation if necessary
        $newFluechtlingDaten = $schueler === null ? null : $this;
        if ($newFluechtlingDaten !== $schueler->getFluechtlingDaten()) {
            $schueler->setFluechtlingDaten($newFluechtlingDaten);
        }

        return $this;
    }

}
