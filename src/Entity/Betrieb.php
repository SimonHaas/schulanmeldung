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

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $gemeindeschluessel;

    /**
     * @ORM\Column(type="integer")
     */
    private $kammer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kuerzel = '';

    private $kammerReadable = '';

    private const KAMMERN = [
        'HWK Bayreuth' => 102,
        'IHK Bayreuth' => 153,
        'IHK Coburg' => 154,
        'IHK Aschaffenburg' => 151,
        'HWK Augsburg' => 101,
        'IHK Augsburg' => 152,
        'IHK Lindau' => 155,
        'IHK München' => 156,
        'HWK Nürnberg' => 105,
        'IHK Nürnberg' => 157,
        'HWK Passau' => 106,
        'IHK Passau' => 158,
        'HWK Regensburg' => 107,
        'IHK Regensburg' => 159,
        'HWK Würzburg' => 108,
        'IHK Würzburg-Schweinfurt' => 160,
        'sonstige' => 000,
    ];

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

    public function getGemeindeschluessel(): ?string
    {
        return $this->gemeindeschluessel;
    }

    public function setGemeindeschluessel(string $gemeindeschluessel): self
    {
        $this->gemeindeschluessel = $gemeindeschluessel;

        return $this;
    }

    public function __toString()
    {
        return $this->getName() . ', ' . $this->getStrasse();
    }

    public function getKammer(): ?int
    {
        return $this->kammer;
    }

    public function getKammerReadable()
    {
        return $this->kammerReadable;
    }

    public static function getKammern()
    {
        return self::KAMMERN;
    }

    private function setKammerReadable(int $kammer)
    {
        $kammerReadable = array_search($kammer, self::KAMMERN);
        if($kammerReadable === false)
            $kammerReadable = 'Fehler';
        $this->kammerReadable = $kammerReadable;
    }

    public function setKammer(int $kammer): self
    {
        $this->kammer = $kammer;
        $this->setKammerReadable($kammer);
        return $this;
    }

    public function getKuerzel(): ?string
    {
        return $this->kuerzel;
    }

    public function setKuerzel(string $kuerzel): self
    {
        $this->kuerzel = $kuerzel;

        return $this;
    }
}
