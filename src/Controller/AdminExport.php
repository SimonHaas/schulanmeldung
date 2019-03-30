<?php

namespace App\Controller;

use App\Entity\Registrierung;
use App\Entity\Schueler;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\Annotation\Route;


class AdminExport extends AbstractController
{

    /**
     * @Route("/download", name="download")
     * @throws Exception
     */
    public function downloadAction() {
        //get data from repository
        $doctrineRegistrations = $this->getDoctrine()->getRepository(Registrierung::class)->findForExport();

        $now = new DateTime();
        $manager = $this->getDoctrine()->getManager();
        foreach($doctrineRegistrations as $registration)
        {
            $registration->setExportedAt($now);
            $manager->persist($registration);
        }
        $manager->flush();

        //build assoc array
        $assocRegistrations = $this->buildRegistrationsAsAssocArray($doctrineRegistrations);

        //build export strings
        $exportStrings = $this->buildRegistrationStrings($assocRegistrations);

        //write file
        $fileName = $this->buildExportFileName();
        $path = $this->getParameter('dir.downloads') . '/' . $fileName;
        $handle = fopen($path, "w");
        fwrite($handle, implode(PHP_EOL, $exportStrings));
        fclose($handle);

        $this->deleteOldExports();
        return $this->file($path);
    }

    /**
     * @throws Exception
     */
    private function deleteOldExports()
    {
        $finder = new Finder();
        $finder->files()->in($this->getParameter('dir.downloads') . '/');
        $fileSystem = new Filesystem();
        foreach ($finder as $file) {
            if($file->getMTime() < time() - 24 * 60 * 60)
            {
                $fileSystem->remove($file);
            }
        }
    }

    /**
     * @Route("/admin/export", name="admin_export")
     * @throws Exception
     */
    public function index()
    {
        //get data from repository
        $doctrineRegistrations = $this->getDoctrine()->getRepository(Registrierung::class)->findForExport();

        //build assoc array
        $assocRegistrations = $this->buildRegistrationsAsAssocArray($doctrineRegistrations);

        //build export strings
        $exportStrings = $this->buildRegistrationStrings($assocRegistrations);

        //render template
        return $this->render('admin_export/index.html.twig', [
            'controller_name' => 'AdminCreateImportController',
            'import_strings' => $exportStrings,
        ]);
    }

    private function buildRegistrationsAsAssocArray($doctrineRegistrations): array
    {
        $assocRegistrations = array();

        /** @var Registrierung $registration */
        foreach ($doctrineRegistrations as $registration) {

            //Schueler-Daten
            $schueler = $registration->getSchueler();

            $registrationData = array(
                '%registierung_mitteilung%' => $registration->getMitteilung(),
                '%registrierung_wohnheim%' => $registration->getWohnheim() ? 'J' : 'N',
                '%registrierung_eintritt_am%' => $registration->getEintrittAm()->format('d.m.Y'),
                '%registrierung_eq_massnahme%' => $registration->getTyp() == 'EQ' ? 'J' : 'N',
                '%registrierung_eintrittsdatum%' => $this->getEintrittsDatum($registration),
                '%registrierung_typ%' => $registration->getTyp(),
                '%schueler_nachname%' => $schueler->getNachname(),
                '%schueler_vorname%' => $schueler->getVorname(),
                '%schueler_rufname%' => $schueler->getRufname(),
                '%schueler_anrede%' => $schueler->getGeschlecht() == 'W' ? 'F' : 'H',
                '%schueler_email%' => $schueler->getEmail(),
                '%schueler_geburtsdatum%' => $schueler->getGeburtsdatum()->format('d.m.Y'),
                '%schueler_geburtsjahr%' => $schueler->getGeburtsdatum()->format('Y'),
                '%schueler_geschlecht%' => $schueler->getGeschlecht(),
                '%schueler_geburtsort%' => $schueler->getGeburtsort(),
                '%schueler_geburtsland%' => $schueler->getGeburtsland(),
                '%schueler_umschueler%' => $schueler->getUmschueler() != null ? 'J' : 'N',
                '%schueler_plz%' => $schueler->getPlz(),
                '%schueler_ort%' => $schueler->getOrt(),
                '%schueler_str%' => $schueler->getStrasse(),
                '%schueler_hausnr%' => $schueler->getHsnr(),
                '%schueler_tel%' => $schueler->getTel(),
                '%schueler_bekenntnis%' => $schueler->getBekenntnis(),
                '%schueler_staat%' => $schueler->getStaatsangehoerigkeit(),
                '%schueler_schulpflicht%' => $this->getSchulPflicht($schueler)
            );

            //Umschueler
            $umschueler = $schueler->getUmschueler();

            if (isset($umschueler)) {
                $registrationData['%umschueler%'] = 'J';
                $registrationData['%umschueler_foerderer_nr%'] = $umschueler->getFoerdererNr();
                $registrationData['%umschueler_traeger%'] = $umschueler->getTraeger();
                $registrationData['%umschueler_traeger_sitz%'] = $umschueler->getTraegerSitz();
            } else {
                $registrationData['%umschueler%'] = 'N';
            }

            //Kontaktperson-Daten
            $kontaktPersonen = $schueler->getKontaktpersonen();

            if (isset($kontaktPersonen) && sizeof($kontaktPersonen) > 0) {
                for ($i = 0; $i < sizeof($kontaktPersonen); $i++) {
                    $baseKey = '%kontakt_person_' . ($i + 1);

                    $kontaktPerson = $kontaktPersonen[$i];

                    $registrationData[$baseKey . '_anrede%'] = $kontaktPerson->getAnrede();
                    $registrationData[$baseKey . '_vorname%'] = $kontaktPerson->getVorname();
                    $registrationData[$baseKey . '_nachname%'] = $kontaktPerson->getNachname();
                    $registrationData[$baseKey . '_strasse%'] = $kontaktPerson->getStrasse();
                    $registrationData[$baseKey . '_hausnummer%'] = $kontaktPerson->getHausnummer();
                    $registrationData[$baseKey . '_plz%'] = $kontaktPerson->getPlz();
                    $registrationData[$baseKey . '_ort%'] = $kontaktPerson->getOrt();
                    $registrationData[$baseKey . '_telefonnummer%'] = $kontaktPerson->getTelefonnummer();
                    $registrationData[$baseKey . '_email%'] = $kontaktPerson->getEmail();
                }
            }

            //Schulbesuche
            $schulBesuche = $schueler->getSchulbesuche();

            if (isset($schulBesuche) && sizeof($schulBesuche) > 0) {
                for ($i = 0; $i < sizeof($schulBesuche); $i++) {
                    $baseKey = '%schulbesuch_' . ($i + 1);

                    $schulBesuch = $schulBesuche[$i];

                    $registrationData[$baseKey . '_eintritt%'] = $schulBesuch->getEintritt()->format('d.m.Y');
                    $registrationData[$baseKey . '_austritt%'] = $schulBesuch->getAustritt()->format('d.m.Y');

                    $schule = $schulBesuch->getSchule();

                    if (isset($schule)) {
                        $registrationData[$baseKey . '_schule_art%'] = $schule->getArt();
                        $registrationData[$baseKey . '_schule_name%'] = $schule->getName();
                        $registrationData[$baseKey . '_schule_strasse%'] = $schule->getStrasse();
                        $registrationData[$baseKey . '_schule_ort%'] = $schule->getOrt();
                        $registrationData[$baseKey . '_schule_plz%'] = $schule->getPlz();
                    }
                }
            }

            //Ausbildung
            $ausbildung = $schueler->getAusbildung();

            if (isset($ausbildung)) {
                $registrationData['%ausbildung_beginn%'] = $ausbildung->getBeginn()->format('d.m.Y');
                $registrationData['%ausbildung_ende%'] = $ausbildung->getEnde()->format('d.m.Y');
                $registrationData['%ausbildung_dauer%'] = $this->getAusbildungDauer($ausbildung->getEnde(), $ausbildung->getBeginn());

                //Beruf
                $beruf = $ausbildung->getBeruf();

                $registrationData['%beruf_bezeichnung%'] = $beruf->getBezeichnung();
                $registrationData['%beruf_nummer%'] = $beruf->getNummer();
                $registrationData['%beruf_klasse%'] = $beruf->getKlasse();

                //Betrieb
                $betrieb = $ausbildung->getBetrieb();

                $registrationData['%betrieb_name%'] = $betrieb->getName();
                $registrationData['%betrieb_nummer%'] = $betrieb->getKuerzel();
                $registrationData['%betrieb_kammer%'] = $betrieb->getKammer();
            }

            //Gastschueler
            $registrationData['%gastschueler%'] = $this->getGastSchueler($registration);


            //Vorbildung
            $registrationData['%von_schulart%'] = $schueler->getLetzteSchulart();
            $registrationData['%von_schulvorbildung%'] = $schueler->getHoechsterAbschluss();
            $registrationData['%von_schulnr%'] = $schueler->getSchulbesuche()->get(0)->getSchule()->getNummer();

            array_push($assocRegistrations, $registrationData);
        }

        return $assocRegistrations;
    }

    private function buildRegistrationStrings($assocRegistrations)
    {
        $exportTemplate = $this->getExportTemplate();

        $importStrings = array();

        foreach ($assocRegistrations as $registration) {
            $exportString = $exportTemplate;

            //apply parameters
            foreach ($registration as $parameter => $value) {
                $exportString = str_replace($parameter, $value, $exportString);
            }

            //remove unmapped parameters
            $exportString = preg_replace('/%\w+%/', '', $exportString);

            array_push($importStrings, $exportString);
        }

        return $importStrings;
    }

    private function buildExportFileName() {
        return date('Y-m-d H:i') . ' Anmeldungen.txt';
    }

    private function getExportTemplate()
    {
        return preg_replace("/\r|\n/", "",
            file_get_contents(APPLICATION_PATH . '/export-template.txt')
        );
    }

    private function getGastSchueler(Registrierung $registrierung) {
        $schueler = $registrierung->getSchueler();
        $ausbildung = $schueler->getAusbildung();

        $ausbArt = $registrierung->getTyp();

        //Umschueler koennen die Schule frei waehlen, alle anderen sind ohne Ausbildungsbetrieb (Jungarbeiter + BGJs)
        if ($ausbArt == 'UM' or $ausbArt == 'BGJs' or $ausbArt == 'UAR' or $ausbArt == 'AUPR' or
            $ausbArt == 'OBA' or $ausbArt == 'TAR' or $ausbArt == 'BVJ' or $ausbArt == 'MF') {
            return 'N';
        }

        $neuerBetrieb = $ausbildung->getBetrieb()->getIstVerifiziert();

        if ($neuerBetrieb) {
            return '?';
        }

        $gemeindeSchluessel = $ausbildung->getBetrieb()->getGemeindeschluessel();

        $B_GKennz1 = substr($gemeindeSchluessel, 0, 1);  //erste Zahl der Gemeindekennzahl des Betriebes
        $B_GKennz3 = substr($gemeindeSchluessel, 0, 3);  //ersten drei Zahlen der Gemeindekennzahl des Betriebes
        $klasse3 = substr($ausbildung->getBeruf()->getKlasse(), 0, 3);

        switch ($klasse3) {
            case "EIE": 	//ganz Franken 4xxxxx - 6xxxxx
                if($B_GKennz1=='4' or $B_GKennz1=='5' or $B_GKennz1=='6')
                    $GASTSCHUELER='S';
                else $GASTSCHUELER='?';
                break;
            case "BFT": 	//ganz Bayern 1xxxxx - 7xxxxx
                if($B_GKennz1=='1' or $B_GKennz1=='2' or $B_GKennz1=='3' or $B_GKennz1=='4' or
                    $B_GKennz1=='5' or $B_GKennz1=='6' or $B_GKennz1=='7')
                    $GASTSCHUELER='S';
                else $GASTSCHUELER='?';
                break;
            case "IIK": case "ITK": case "ITE": case "XFG": //ganz OFR 4xxxxx
            if($B_GKennz1=='4')
                $GASTSCHUELER='S';
            else $GASTSCHUELER='?';
            break;
            case "IFI": case "EME":	//OFR-Ost Hof-Landkreis+Stadt, Kulmbach, Wunsiedel
            if($B_GKennz3=="475" or $B_GKennz3=="464" or $B_GKennz3=="477" or $B_GKennz3=="479")
                $GASTSCHUELER='S';
            else $GASTSCHUELER='?';
            break;
            case "FML": case "KFR": //Kulmbach
            if($B_GKennz3=='477')
                $GASTSCHUELER='S';
            else $GASTSCHUELER='?';
            break;
            case "MKF": case "ETE": case "MFT": case "MIT": case "NBA": case "NFN":
            $GASTSCHUELER='?';   //falls diese Berufe hier auftauchen, sind sie falsch oder Gastschueler!!
            break;
            default:			//alle Klassen, die oben noch nicht aufgefuehrt wurden - sollte nicht zur Anwendung kommen
                $GASTSCHUELER='X';
                break;
        }

        return $GASTSCHUELER;
    }

    private function getEintrittsDatum(Registrierung $registrierung) {

    }

    private function getSchulPflicht(Schueler $schueler) {
        $schulbesuche = $schueler->getSchulbesuche();
        $jahre = 0;

        foreach ($schulbesuche as $schulbesuch) {
            $jahre += (intval($schulbesuch->getAustritt()->format('Y'))
                - intval($schulbesuch->getEintritt()->format('Y')));
        }

        return $jahre >= 12 ? 'J' : 'N';
    }

    private function getAusbildungDauer(\DateTimeInterface $ende, \DateTimeInterface $beginn) {
        $dayDiff = $ende->diff($beginn)->days;
        $jahre = $dayDiff / 365;

        //runden auf halbe jahre
        return floor($jahre * 2) / 2;
    }

}
