<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="betriebedaten")
 * @ORM\Entity(repositoryClass="App\Repository\BetriebRepository")
 */
class Betrieb
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ansprPartner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $strasse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $hsnr;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $plz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telZentrale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telDurchwahl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $istVerifiziert;

    //TODO im Formular sicherstellen, dass das nicht null ist.
    // neue Kammer anlegen, oder im Nofall doch auf Null lassen?
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kammer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kammer;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $gemeindeschluessel;

    public function __construct()
    {
        $this->ausbildungen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnsprPartner(): ?string
    {
        return $this->ansprPartner;
    }

    public function setAnsprPartner(?string $ansprPartner): self
    {
        $this->ansprPartner = $ansprPartner;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getHsnr(): ?string
    {
        return $this->hsnr;
    }

    public function setHsnr(string $hsnr): self
    {
        $this->hsnr = $hsnr;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

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

    public function getTelZentrale(): ?string
    {
        return $this->telZentrale;
    }

    public function setTelZentrale(string $telZentrale): self
    {
        $this->telZentrale = $telZentrale;

        return $this;
    }

    public function getTelDurchwahl(): ?string
    {
        return $this->telDurchwahl;
    }

    public function setTelDurchwahl(?string $telDurchwahl): self
    {
        $this->telDurchwahl = $telDurchwahl;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIstVerifiziert(): ?bool
    {
        return $this->istVerifiziert;
    }

    public function setIstVerifiziert(bool $istVerifiziert): self
    {
        $this->istVerifiziert = $istVerifiziert;

        return $this;
    }

    public function getKammer(): ?Kammer
    {
        return $this->kammer;
    }

    public function setKammer(?Kammer $kammer): self
    {
        $this->kammer = $kammer;

        return $this;
    }

    public function getGemeindeschluessel(): ?string
    {
        return $this->gemeindeschluessel;
    }

    public function setGemeindeschluessel(string $gemeindeschluessel): self
    {
        $this->gemeindeschluessel = $gemeindeschluessel;

        return $this;
    }

    public function set($array): self
    {
        $this->name = $array['name'];
        $this->ansprPartner = $array['ansprPartner'];
        $this->strasse = $array['strasse'];
        $this->hsnr = $array['hsnr'];
        $this->plz = $array['plz'];
        $this->ort = $array['ort'];
        $this->telZentrale = $array['telZentrale'];
        $this->telDurchwahl = $array['telDurchwahl'];
        $this->fax = $array['fax'];
        $this->email = $array['email'];
        $this->gemeindeschluessel = $array['gemeindeschluessel'];
        $this->kammer = $array['kammer'];
        $this->istVerifiziert = false;

        return $this;
    }

    public function __toString()
    {
        return $this->getName() . ', ' . $this->getStrasse() . ' ' . $this->getHsnr();
    }
}
