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
    private $anschr1_fuer2; /**ToDo: Funktion unbekannt */

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
     * @return mixed
     */
    public function getAnrede()
    {
        return $this->anrede;
    }

    /**
     * @param mixed $anrede
     * @return Schueler
     */
    public function setAnrede($anrede)
    {
        $this->anrede = $anrede;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFamilienname()
    {
        return $this->familienname;
    }

    /**
     * @param mixed $familienname
     * @return Schueler
     */
    public function setFamilienname($familienname)
    {
        $this->familienname = $familienname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     * @return Schueler
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRufname()
    {
        return $this->rufname;
    }

    /**
     * @param mixed $rufname
     * @return Schueler
     */
    public function setRufname($rufname)
    {
        $this->rufname = $rufname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeschlecht()
    {
        return $this->geschlecht;
    }

    /**
     * @param mixed $geschlecht
     * @return Schueler
     */
    public function setGeschlecht($geschlecht)
    {
        $this->geschlecht = $geschlecht;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeburtsdatum()
    {
        return $this->geburtsdatum;
    }

    /**
     * @param mixed $geburtsdatum
     * @return Schueler
     */
    public function setGeburtsdatum($geburtsdatum)
    {
        $this->geburtsdatum = $geburtsdatum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeburtsort()
    {
        return $this->geburtsort;
    }

    /**
     * @param mixed $geburtsort
     * @return Schueler
     */
    public function setGeburtsort($geburtsort)
    {
        $this->geburtsort = $geburtsort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeburtsland()
    {
        return $this->geburtsland;
    }

    /**
     * @param mixed $geburtsland
     * @return Schueler
     */
    public function setGeburtsland($geburtsland)
    {
        $this->geburtsland = $geburtsland;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStaat()
    {
        return $this->staat;
    }

    /**
     * @param mixed $staat
     * @return Schueler
     */
    public function setStaat($staat)
    {
        $this->staat = $staat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBekenntnis()
    {
        return $this->bekenntnis;
    }

    /**
     * @param mixed $bekenntnis
     * @return Schueler
     */
    public function setBekenntnis($bekenntnis)
    {
        $this->bekenntnis = $bekenntnis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFamilienstand()
    {
        return $this->familienstand;
    }

    /**
     * @param mixed $familienstand
     * @return Schueler
     */
    public function setFamilienstand($familienstand)
    {
        $this->familienstand = $familienstand;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * @param mixed $email1
     * @return Schueler
     */
    public function setEmail1($email1)
    {
        $this->email1 = $email1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed $telefon
     * @return Schueler
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschr1Fuer1()
    {
        return $this->anschr1_fuer1;
    }

    /**
     * @param mixed $anschr1_fuer1
     * @return Schueler
     */
    public function setAnschr1Fuer1($anschr1_fuer1)
    {
        $this->anschr1_fuer1 = $anschr1_fuer1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschr1Fuer2()
    {
        return $this->anschr1_fuer2;
    }

    /**
     * @param mixed $anschr1_fuer2
     * @return Schueler
     */
    public function setAnschr1Fuer2($anschr1_fuer2)
    {
        $this->anschr1_fuer2 = $anschr1_fuer2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter1Art()
    {
        return $this->erziehungsberechtigter1_art;
    }

    /**
     * @param mixed $erziehungsberechtigter1_art
     * @return Schueler
     */
    public function setErziehungsberechtigter1Art($erziehungsberechtigter1_art)
    {
        $this->erziehungsberechtigter1_art = $erziehungsberechtigter1_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter1Anrede()
    {
        return $this->erziehungsberechtigter1_anrede;
    }

    /**
     * @param mixed $erziehungsberechtigter1_anrede
     * @return Schueler
     */
    public function setErziehungsberechtigter1Anrede($erziehungsberechtigter1_anrede)
    {
        $this->erziehungsberechtigter1_anrede = $erziehungsberechtigter1_anrede;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter1Familienname()
    {
        return $this->erziehungsberechtigter1_familienname;
    }

    /**
     * @param mixed $erziehungsberechtigter1_familienname
     * @return Schueler
     */
    public function setErziehungsberechtigter1Familienname($erziehungsberechtigter1_familienname)
    {
        $this->erziehungsberechtigter1_familienname = $erziehungsberechtigter1_familienname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter1Rufname()
    {
        return $this->erziehungsberechtigter1_rufname;
    }

    /**
     * @param mixed $erziehungsberechtigter1_rufname
     * @return Schueler
     */
    public function setErziehungsberechtigter1Rufname($erziehungsberechtigter1_rufname)
    {
        $this->erziehungsberechtigter1_rufname = $erziehungsberechtigter1_rufname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter1Telefon()
    {
        return $this->erziehungsberechtigter1_telefon;
    }

    /**
     * @param mixed $erziehungsberechtigter1_telefon
     * @return Schueler
     */
    public function setErziehungsberechtigter1Telefon($erziehungsberechtigter1_telefon)
    {
        $this->erziehungsberechtigter1_telefon = $erziehungsberechtigter1_telefon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param mixed $email2
     * @return Schueler
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter2Art()
    {
        return $this->erziehungsberechtigter2_art;
    }

    /**
     * @param mixed $erziehungsberechtigter2_art
     * @return Schueler
     */
    public function setErziehungsberechtigter2Art($erziehungsberechtigter2_art)
    {
        $this->erziehungsberechtigter2_art = $erziehungsberechtigter2_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter2Anrede()
    {
        return $this->erziehungsberechtigter2_anrede;
    }

    /**
     * @param mixed $erziehungsberechtigter2_anrede
     * @return Schueler
     */
    public function setErziehungsberechtigter2Anrede($erziehungsberechtigter2_anrede)
    {
        $this->erziehungsberechtigter2_anrede = $erziehungsberechtigter2_anrede;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter2Familienname()
    {
        return $this->erziehungsberechtigter2_familienname;
    }

    /**
     * @param mixed $erziehungsberechtigter2_familienname
     * @return Schueler
     */
    public function setErziehungsberechtigter2Familienname($erziehungsberechtigter2_familienname)
    {
        $this->erziehungsberechtigter2_familienname = $erziehungsberechtigter2_familienname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter2Rufname()
    {
        return $this->erziehungsberechtigter2_rufname;
    }

    /**
     * @param mixed $erziehungsberechtigter2_rufname
     * @return Schueler
     */
    public function setErziehungsberechtigter2Rufname($erziehungsberechtigter2_rufname)
    {
        $this->erziehungsberechtigter2_rufname = $erziehungsberechtigter2_rufname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErziehungsberechtigter2Telefon()
    {
        return $this->erziehungsberechtigter2_telefon;
    }

    /**
     * @param mixed $erziehungsberechtigter2_telefon
     * @return Schueler
     */
    public function setErziehungsberechtigter2Telefon($erziehungsberechtigter2_telefon)
    {
        $this->erziehungsberechtigter2_telefon = $erziehungsberechtigter2_telefon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Strasse()
    {
        return $this->anschrift2_strasse;
    }

    /**
     * @param mixed $anschrift2_strasse
     * @return Schueler
     */
    public function setAnschrift2Strasse($anschrift2_strasse)
    {
        $this->anschrift2_strasse = $anschrift2_strasse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Plz()
    {
        return $this->anschrift2_plz;
    }

    /**
     * @param mixed $anschrift2_plz
     * @return Schueler
     */
    public function setAnschrift2Plz($anschrift2_plz)
    {
        $this->anschrift2_plz = $anschrift2_plz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Ort()
    {
        return $this->anschrift2_ort;
    }

    /**
     * @param mixed $anschrift2_ort
     * @return Schueler
     */
    public function setAnschrift2Ort($anschrift2_ort)
    {
        $this->anschrift2_ort = $anschrift2_ort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Telefon()
    {
        return $this->anschrift2_telefon;
    }

    /**
     * @param mixed $anschrift2_telefon
     * @return Schueler
     */
    public function setAnschrift2Telefon($anschrift2_telefon)
    {
        $this->anschrift2_telefon = $anschrift2_telefon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Fuer1()
    {
        return $this->anschrift2_fuer1;
    }

    /**
     * @param mixed $anschrift2_fuer1
     * @return Schueler
     */
    public function setAnschrift2Fuer1($anschrift2_fuer1)
    {
        $this->anschrift2_fuer1 = $anschrift2_fuer1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnschrift2Fuer2()
    {
        return $this->anschrift2_fuer2;
    }

    /**
     * @param mixed $anschrift2_fuer2
     * @return Schueler
     */
    public function setAnschrift2Fuer2($anschrift2_fuer2)
    {
        $this->anschrift2_fuer2 = $anschrift2_fuer2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGastschueler()
    {
        return $this->gastschueler;
    }

    /**
     * @param mixed $gastschueler
     * @return Schueler
     */
    public function setGastschueler($gastschueler)
    {
        $this->gastschueler = $gastschueler;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUmschueler()
    {
        return $this->umschueler;
    }

    /**
     * @param mixed $umschueler
     * @return Schueler
     */
    public function setUmschueler($umschueler)
    {
        $this->umschueler = $umschueler;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKostentraeger()
    {
        return $this->kostentraeger;
    }

    /**
     * @param mixed $kostentraeger
     * @return Schueler
     */
    public function setKostentraeger($kostentraeger)
    {
        $this->kostentraeger = $kostentraeger;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTraegersitz()
    {
        return $this->traegersitz;
    }

    /**
     * @param mixed $traegersitz
     * @return Schueler
     */
    public function setTraegersitz($traegersitz)
    {
        $this->traegersitz = $traegersitz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoerderungsnummer()
    {
        return $this->foerderungsnummer;
    }

    /**
     * @param mixed $foerderungsnummer
     * @return Schueler
     */
    public function setFoerderungsnummer($foerderungsnummer)
    {
        $this->foerderungsnummer = $foerderungsnummer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchulpflicht()
    {
        return $this->schulpflicht;
    }

    /**
     * @param mixed $schulpflicht
     * @return Schueler
     */
    public function setSchulpflicht($schulpflicht)
    {
        $this->schulpflicht = $schulpflicht;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTagesheim()
    {
        return $this->tagesheim;
    }

    /**
     * @param mixed $tagesheim
     * @return Schueler
     */
    public function setTagesheim($tagesheim)
    {
        $this->tagesheim = $tagesheim;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungBeginn()
    {
        return $this->ausbildung_beginn;
    }

    /**
     * @param mixed $ausbildung_beginn
     * @return Schueler
     */
    public function setAusbildungBeginn($ausbildung_beginn)
    {
        $this->ausbildung_beginn = $ausbildung_beginn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungEnde()
    {
        return $this->ausbildung_ende;
    }

    /**
     * @param mixed $ausbildung_ende
     * @return Schueler
     */
    public function setAusbildungEnde($ausbildung_ende)
    {
        $this->ausbildung_ende = $ausbildung_ende;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungDauer()
    {
        return $this->ausbildung_dauer;
    }

    /**
     * @param mixed $ausbildung_dauer
     * @return Schueler
     */
    public function setAusbildungDauer($ausbildung_dauer)
    {
        $this->ausbildung_dauer = $ausbildung_dauer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungArt()
    {
        return $this->ausbildung_art;
    }

    /**
     * @param mixed $ausbildung_art
     * @return Schueler
     */
    public function setAusbildungArt($ausbildung_art)
    {
        $this->ausbildung_art = $ausbildung_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungBeruf()
    {
        return $this->ausbildung_beruf;
    }

    /**
     * @param mixed $ausbildung_beruf
     * @return Schueler
     */
    public function setAusbildungBeruf($ausbildung_beruf)
    {
        $this->ausbildung_beruf = $ausbildung_beruf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAusbildungBetrieb()
    {
        return $this->ausbildung_betrieb;
    }

    /**
     * @param mixed $ausbildung_betrieb
     * @return Schueler
     */
    public function setAusbildungBetrieb($ausbildung_betrieb)
    {
        $this->ausbildung_betrieb = $ausbildung_betrieb;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebName1()
    {
        return $this->betrieb_name1;
    }

    /**
     * @param mixed $betrieb_name1
     * @return Schueler
     */
    public function setBetriebName1($betrieb_name1)
    {
        $this->betrieb_name1 = $betrieb_name1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebName2()
    {
        return $this->betrieb_name2;
    }

    /**
     * @param mixed $betrieb_name2
     * @return Schueler
     */
    public function setBetriebName2($betrieb_name2)
    {
        $this->betrieb_name2 = $betrieb_name2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebStrasse()
    {
        return $this->betrieb_strasse;
    }

    /**
     * @param mixed $betrieb_strasse
     * @return Schueler
     */
    public function setBetriebStrasse($betrieb_strasse)
    {
        $this->betrieb_strasse = $betrieb_strasse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebPlz()
    {
        return $this->betrieb_plz;
    }

    /**
     * @param mixed $betrieb_plz
     * @return Schueler
     */
    public function setBetriebPlz($betrieb_plz)
    {
        $this->betrieb_plz = $betrieb_plz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebOrt()
    {
        return $this->betrieb_ort;
    }

    /**
     * @param mixed $betrieb_ort
     * @return Schueler
     */
    public function setBetriebOrt($betrieb_ort)
    {
        $this->betrieb_ort = $betrieb_ort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebTelefon1()
    {
        return $this->betrieb_telefon1;
    }

    /**
     * @param mixed $betrieb_telefon1
     * @return Schueler
     */
    public function setBetriebTelefon1($betrieb_telefon1)
    {
        $this->betrieb_telefon1 = $betrieb_telefon1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebTelefon2()
    {
        return $this->betrieb_telefon2;
    }

    /**
     * @param mixed $betrieb_telefon2
     * @return Schueler
     */
    public function setBetriebTelefon2($betrieb_telefon2)
    {
        $this->betrieb_telefon2 = $betrieb_telefon2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebTelefon3()
    {
        return $this->betrieb_telefon3;
    }

    /**
     * @param mixed $betrieb_telefon3
     * @return Schueler
     */
    public function setBetriebTelefon3($betrieb_telefon3)
    {
        $this->betrieb_telefon3 = $betrieb_telefon3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebEmail()
    {
        return $this->betrieb_email;
    }

    /**
     * @param mixed $betrieb_email
     * @return Schueler
     */
    public function setBetriebEmail($betrieb_email)
    {
        $this->betrieb_email = $betrieb_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBetriebBbig()
    {
        return $this->betrieb_bbig;
    }

    /**
     * @param mixed $betrieb_bbig
     * @return Schueler
     */
    public function setBetriebBbig($betrieb_bbig)
    {
        $this->betrieb_bbig = $betrieb_bbig;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKammer()
    {
        return $this->kammer;
    }

    /**
     * @param mixed $kammer
     * @return Schueler
     */
    public function setKammer($kammer)
    {
        $this->kammer = $kammer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEintrittsdatum()
    {
        return $this->eintrittsdatum;
    }

    /**
     * @param mixed $eintrittsdatum
     * @return Schueler
     */
    public function setEintrittsdatum($eintrittsdatum)
    {
        $this->eintrittsdatum = $eintrittsdatum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKlasse()
    {
        return $this->klasse;
    }

    /**
     * @param mixed $klasse
     * @return Schueler
     */
    public function setKlasse($klasse)
    {
        $this->klasse = $klasse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEintrittJgst()
    {
        return $this->eintritt_jgst;
    }

    /**
     * @param mixed $eintritt_jgst
     * @return Schueler
     */
    public function setEintrittJgst($eintritt_jgst)
    {
        $this->eintritt_jgst = $eintritt_jgst;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVonSchulart()
    {
        return $this->von_schulart;
    }

    /**
     * @param mixed $von_schulart
     * @return Schueler
     */
    public function setVonSchulart($von_schulart)
    {
        $this->von_schulart = $von_schulart;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVonSchulnummer()
    {
        return $this->von_schulnummer;
    }

    /**
     * @param mixed $von_schulnummer
     * @return Schueler
     */
    public function setVonSchulnummer($von_schulnummer)
    {
        $this->von_schulnummer = $von_schulnummer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchulVorbild()
    {
        return $this->schul_vorbild;
    }

    /**
     * @param mixed $schul_vorbild
     * @return Schueler
     */
    public function setSchulVorbild($schul_vorbild)
    {
        $this->schul_vorbild = $schul_vorbild;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVorbildSchul()
    {
        return $this->vorbild_schul;
    }

    /**
     * @param mixed $vorbild_schul
     * @return Schueler
     */
    public function setVorbildSchul($vorbild_schul)
    {
        $this->vorbild_schul = $vorbild_schul;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule1()
    {
        return $this->sv_slbschule1;
    }

    /**
     * @param mixed $sv_slbschule1
     * @return Schueler
     */
    public function setSvSlbschule1($sv_slbschule1)
    {
        $this->sv_slbschule1 = $sv_slbschule1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule1eintritt()
    {
        return $this->sv_slbschule1eintritt;
    }

    /**
     * @param mixed $sv_slbschule1eintritt
     * @return Schueler
     */
    public function setSvSlbschule1eintritt($sv_slbschule1eintritt)
    {
        $this->sv_slbschule1eintritt = $sv_slbschule1eintritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule1austritt()
    {
        return $this->sv_slbschule1austritt;
    }

    /**
     * @param mixed $sv_slbschule1austritt
     * @return Schueler
     */
    public function setSvSlbschule1austritt($sv_slbschule1austritt)
    {
        $this->sv_slbschule1austritt = $sv_slbschule1austritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule2()
    {
        return $this->sv_slbschule2;
    }

    /**
     * @param mixed $sv_slbschule2
     * @return Schueler
     */
    public function setSvSlbschule2($sv_slbschule2)
    {
        $this->sv_slbschule2 = $sv_slbschule2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule2eintritt()
    {
        return $this->sv_slbschule2eintritt;
    }

    /**
     * @param mixed $sv_slbschule2eintritt
     * @return Schueler
     */
    public function setSvSlbschule2eintritt($sv_slbschule2eintritt)
    {
        $this->sv_slbschule2eintritt = $sv_slbschule2eintritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule2austritt()
    {
        return $this->sv_slbschule2austritt;
    }

    /**
     * @param mixed $sv_slbschule2austritt
     * @return Schueler
     */
    public function setSvSlbschule2austritt($sv_slbschule2austritt)
    {
        $this->sv_slbschule2austritt = $sv_slbschule2austritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule3()
    {
        return $this->sv_slbschule3;
    }

    /**
     * @param mixed $sv_slbschule3
     * @return Schueler
     */
    public function setSvSlbschule3($sv_slbschule3)
    {
        $this->sv_slbschule3 = $sv_slbschule3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule3eintritt()
    {
        return $this->sv_slbschule3eintritt;
    }

    /**
     * @param mixed $sv_slbschule3eintritt
     * @return Schueler
     */
    public function setSvSlbschule3eintritt($sv_slbschule3eintritt)
    {
        $this->sv_slbschule3eintritt = $sv_slbschule3eintritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule3austritt()
    {
        return $this->sv_slbschule3austritt;
    }

    /**
     * @param mixed $sv_slbschule3austritt
     * @return Schueler
     */
    public function setSvSlbschule3austritt($sv_slbschule3austritt)
    {
        $this->sv_slbschule3austritt = $sv_slbschule3austritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule4()
    {
        return $this->sv_slbschule4;
    }

    /**
     * @param mixed $sv_slbschule4
     * @return Schueler
     */
    public function setSvSlbschule4($sv_slbschule4)
    {
        $this->sv_slbschule4 = $sv_slbschule4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule4eintritt()
    {
        return $this->sv_slbschule4eintritt;
    }

    /**
     * @param mixed $sv_slbschule4eintritt
     * @return Schueler
     */
    public function setSvSlbschule4eintritt($sv_slbschule4eintritt)
    {
        $this->sv_slbschule4eintritt = $sv_slbschule4eintritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSvSlbschule4austritt()
    {
        return $this->sv_slbschule4austritt;
    }

    /**
     * @param mixed $sv_slbschule4austritt
     * @return Schueler
     */
    public function setSvSlbschule4austritt($sv_slbschule4austritt)
    {
        $this->sv_slbschule4austritt = $sv_slbschule4austritt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZuzugArt()
    {
        return $this->zuzug_art;
    }

    /**
     * @param mixed $zuzug_art
     * @return Schueler
     */
    public function setZuzugArt($zuzug_art)
    {
        $this->zuzug_art = $zuzug_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZuzugDatum()
    {
        return $this->zuzug_datum;
    }

    /**
     * @param mixed $zuzug_datum
     * @return Schueler
     */
    public function setZuzugDatum($zuzug_datum)
    {
        $this->zuzug_datum = $zuzug_datum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKommentar()
    {
        return $this->kommentar;
    }

    /**
     * @param mixed $kommentar
     * @return Schueler
     */
    public function setKommentar($kommentar)
    {
        $this->kommentar = $kommentar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnmeldedatum()
    {
        return $this->anmeldedatum;
    }

    /**
     * @param mixed $anmeldedatum
     * @return Schueler
     */
    public function setAnmeldedatum($anmeldedatum)
    {
        $this->anmeldedatum = $anmeldedatum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnmeldezeit()
    {
        return $this->anmeldezeit;
    }

    /**
     * @param mixed $anmeldezeit
     * @return Schueler
     */
    public function setAnmeldezeit($anmeldezeit)
    {
        $this->anmeldezeit = $anmeldezeit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeutsch()
    {
        return $this->deutsch;
    }

    /**
     * @param mixed $deutsch
     * @return Schueler
     */
    public function setDeutsch($deutsch)
    {
        $this->deutsch = $deutsch;
        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $deutsch;


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
 