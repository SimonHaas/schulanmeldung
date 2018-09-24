<?php

namespace App\Entity;

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
    private $anrede;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $familienname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vorname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rufname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geschlecht;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $geburtsdatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geburtsort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geburtsland;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $staat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bekenntnis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $familienstand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email1;

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
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschr1_fuer1; /**ToDo: Funktion unbekannt */

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschr1_fuer2; /**ToDo: Funktion unbekannt */;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter1_art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter1_anrede;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter1_familienname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter1_rufname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter1_telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter2_art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter2_anrede;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter2_familienname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter2_rufname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $erziehungsberechtigter2_telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschrift2_strasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschrift2_plz;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $anschrift2_ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschrift2_telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschrift2_fuer1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anschrift2_fuer2;

    /**
     * @ORM\Column(type="boolean", length=1)
     */
    private $gastschueler;

    /**
     * @ORM\Column(type="boolean", length=1)
     */
    private $umschueler;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kostentraeger;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $traegersitz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foerderungsnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $schulpflicht;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tagesheim;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $ausbildung_beginn;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $ausbildung_ende;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ausbildung_dauer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ausbildung_art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ausbildung_beruf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ausbildung_betrieb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_name1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_name2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_strasse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $betrieb_plz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_telefon1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_telefon2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_telefon3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betrieb_bbig;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kammer;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $eintrittsdatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $klasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eintritt_jgst;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $von_schulart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $von_schulnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $schul_vorbild;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vorbild_schul;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule1eintritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule1austritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule2eintritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule2austritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule3eintritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule3austritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule4eintritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sv_slbschule4austritt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zuzug_art;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $zuzug_datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kommentar;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $anmeldedatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anmeldezeit;

    /**
     * @ORM\Column(type="string")
     */
    private $deutsch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

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

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getPlz(): ?int
    {
        return $this->plz;
    }

    public function setPlz(int $plz): self
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
}
 