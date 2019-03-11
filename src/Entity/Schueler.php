<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Intl\Intl;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Kontaktperson", mappedBy="schueler", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $kontaktpersonen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schulbesuch", mappedBy="schueler", orphanRemoval=true, cascade={"persist", "remove"})
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
     * @ORM\OneToOne(targetEntity="App\Entity\Fluechtling", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $fluechtling;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Umschueler", inversedBy="schueler", cascade={"persist", "remove"})
     */
    private $umschueler;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $geschlecht;

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
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geburtsland;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $staatsangehoerigkeit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bekenntnis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $letzteSchulart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hoechsterAbschluss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hoechAbschlAn;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $zuzugAm;

    private $geburtslandReadable;
    private $staatsangehoerigkeitReadable;
    private $hoechsterAbschlussReadable;
    private $letzteSchulartReadable;
    private $hoechAbschlAnReadable;
    private $bekenntnisReadable;
    private const BEKENNTNISSE = [
            'römisch-katholisch' => 'RK',
            'evangelisch' => 'RV',
            'evang.-meth.' => 'EM',
            'freie ev. Gemeinde' => 'EF',
            'evang.-freikirchlich' => 'BE',
            'evang.-reformiert' => 'ER',
            'islamisch' => 'IL',
            'russisch-orthodox' => 'RO',
            'griechisch-orthodox' => 'GO',
            'serbisch-orthodox' => 'SE',
            'rumänisch-orthodox' => 'UO',
            'syrisch-orthodox' => 'SY',
            'Zeugen Jehova' => 'ZJ',
            'israelisch' => 'IS',
            'neuapostolisch' => 'NA',
            'Sieben Tags-Adven.' => 'ST',
            'altkatholisch' => 'AK',
            'bekenntnislos' => 'BL',
            'sonstige' => 'SO'
        ];
    private const LETZTE_SCHULARTEN = [
        'allgemeinbildende Schule' => 'AL',
        'Berufsschule' => 'BS',
        'Wirtschaftsschule' => 'WS',
        'Fachoberschule' => 'FOS',
        'BVJ der BS.' => 'BVJ',
        'Berufsfachschule' => 'BFS',
        'sonstige Schule' => 'SO',
        'Maßnahme des Arbeitsamtes' => 'AV',
        'keine Schule' => '-'
    ];
    private const HOECHSTE_ABSCHLUESSE = [
        'erfüllte Schulpflicht ohne Abschluss' => 'VSo',
        'erfolgreicher Hauptschulabschluss (ohne Quali)' => 'HSo',
        'qualifizierter Hauptschulabschluss (mit Quali)' => 'HSq',
        'mittlerer Bildungsabschluss' => 'M',
        'Fachhochschulreife' => 'H',
        'Allgemeine Hochschulreife' => 'AH',
        'Fachgebundene Hochschulreife' => 'FH',
        'Abschluss der Schule zur indiv. Lernförderung' => 'SVS',
        'sonstiger Abschluss' => 'SO'
    ];
    private const HOECHSTE_ABSCHLUESSE_AN = [
        'Hauptschule oder Mittelschule' => 'VS',
        'Volksschule zur sonderpäd. Förderung' => 'SVS',
        'Realschule' => 'RS',
        'Wirtschaftsschule' => 'WS',
        'Gymnasium' => 'GY',
        'Berufsschule' => 'BS',
        'Berufsschule zur sonderpäd. Förderung' => 'SBS',
        'Fachoberschule' => 'FOS',
        'sonstige Schule' => 'SO'
    ];

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

    public function setVorname(string $vorname, bool $uppercase = true): self
    {
        if($uppercase)
            $this->vorname = ucwords($vorname);

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname, bool $uppercase = true): self
    {
        if($uppercase)
            $this->nachname = ucwords($nachname);

        return $this;
    }

    public function getRufname(): ?string
    {
        return $this->rufname;
    }

    public function setRufname(string $rufname, bool $uppercase = true): self
    {
        if($uppercase)
            $this->rufname = ucwords($rufname);

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

    public function addSchulbesuch(Schulbesuch $schulbesuch): self
    {
        if (!$this->schulbesuche->contains($schulbesuch)) {
            $this->schulbesuche[] = $schulbesuch;
            $schulbesuch->setSchueler($this);
        }

        return $this;
    }

    public function removeSchulbesuch(Schulbesuch $schulbesuch): self
    {
        if ($this->schulbesuche->contains($schulbesuch)) {
            $this->schulbesuche->removeElement($schulbesuch);
            // set the owning side to null (unless already changed)
            if ($schulbesuch->getSchueler() === $this) {
                $schulbesuch->setSchueler(null);
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

    public function getFluechtling(): ?Fluechtling
    {
        return $this->fluechtling;
    }

    public function setFluechtling(?Fluechtling $fluechtling): self
    {
        $this->fluechtling = $fluechtling;

        return $this;
    }

    public function getUmschueler(): ?Umschueler
    {
        return $this->umschueler;
    }

    public function setUmschueler(?Umschueler $umschueler): self
    {
        $this->umschueler = $umschueler;

        return $this;
    }

    public function getGeschlecht(): ?string
    {
        return $this->geschlecht;
    }

    public function setGeschlecht(string $geschlecht): self
    {
        $this->geschlecht = $geschlecht;

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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

    public function getGeburtsland(): ?string
    {
        return $this->geburtsland;
    }

    public function setGeburtsland(string $geburtsland): self
    {
        $this->geburtsland = $geburtsland;
        $this->geburtslandReadable = Intl::getRegionBundle()->getCountryName($geburtsland);
        return $this;
    }

    public function getGeburtslandReadable()
    {
        return $this->geburtslandReadable;
    }

    public function getStaatsangehoerigkeit(): ?string
    {
        return $this->staatsangehoerigkeit;
    }

    public function setStaatsangehoerigkeit(string $staatsangehoerigkeit): self
    {
        $this->staatsangehoerigkeit = $staatsangehoerigkeit;
        $this->staatsangehoerigkeitReadable = Intl::getRegionBundle()->getCountryName($staatsangehoerigkeit);

        return $this;
    }

    public function getStaatsangehoerigkeitReadable(): ?string
    {
        return $this->staatsangehoerigkeitReadable;
    }

    public function getBekenntnis(): ?string
    {
        return $this->bekenntnis;
    }

    public function getBekenntnisReadable(): ?string
    {
        return $this->bekenntnisReadable;

    }

    public function setBekenntnis(string $bekenntnis): self
    {
        $this->bekenntnis = $bekenntnis;

        $bekenntnisReadable = array_search($bekenntnis, $this->getBekenntnisse());
        if($bekenntnisReadable == false) $bekenntnisReadable = 'Fehler';
        $this->bekenntnisReadable = $bekenntnisReadable;

        return $this;
    }

    public function getLetzteSchulart(): ?string
    {
        return $this->letzteSchulart;
    }

    public function setLetzteSchulart(string $letzteSchulart): self
    {
        $this->letzteSchulart = $letzteSchulart;

        $letzteSchulartReadable = array_search($letzteSchulart, self::LETZTE_SCHULARTEN);
        if($letzteSchulartReadable == false) $letzteSchulartReadable = 'Fehler';
        $this->letzteSchulartReadable = $letzteSchulartReadable;
        return $this;
    }

    public function getLetzteSchulartReadable(): ?string
    {
        return $this->letzteSchulartReadable;
    }

    public function getHoechsterAbschluss(): ?string
    {
        return $this->hoechsterAbschluss;
    }

    public function setHoechsterAbschluss(string $hoechsterAbschluss): self
    {
        $this->hoechsterAbschluss = $hoechsterAbschluss;

        $hoechsterAbschlussReadable = array_search($hoechsterAbschluss, self::HOECHSTE_ABSCHLUESSE);
        if($hoechsterAbschlussReadable == false) $hoechsterAbschlussReadable = 'Fehler';
        $this->hoechsterAbschlussReadable = $hoechsterAbschlussReadable;
        return $this;
    }

    public function getHoechsterAbschlussReadable(): ?string
    {
        return $this->hoechsterAbschlussReadable;
    }

    public function getHoechAbschlAn(): ?string
    {
        return $this->hoechAbschlAn;
    }

    public function setHoechAbschlAn(string $hoechAbschlAn): self
    {
        $this->hoechAbschlAn = $hoechAbschlAn;

        $hoechAbschlAnReadable = array_search($hoechAbschlAn, self::HOECHSTE_ABSCHLUESSE_AN);
        if($hoechAbschlAnReadable == false) $hoechAbschlAnReadable = 'Fehler';
        $this->hoechAbschlAnReadable = $hoechAbschlAnReadable;

        return $this;
    }

    public function getHoechAbschlAnReadable(): ?string
    {
        return $this->hoechAbschlAnReadable;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getVorname() . ' ' . $this->getNachname();
    }

    public function getZuzugAm(): ?\DateTimeInterface
    {
        return $this->zuzugAm;
    }

    public function setZuzugAm(?\DateTimeInterface $zuzugAm): self
    {
        $this->zuzugAm = $zuzugAm;

        return $this;
    }

    public static function getBekenntnisse() {
        return self::BEKENNTNISSE;
    }
    public static function getLetzteSchularten() {
        return self::LETZTE_SCHULARTEN;
    }
    public static function getHoechsteAbschluesse() {
        return self::HOECHSTE_ABSCHLUESSE;
    }
    public static function getHoechsteAbschluesseAn() {
        return self::HOECHSTE_ABSCHLUESSE_AN;
    }
}
