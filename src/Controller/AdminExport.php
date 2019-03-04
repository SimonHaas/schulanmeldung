<?php

namespace App\Controller;

use App\Entity\Registrierung;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AdminExport extends AbstractController
{
    /**
     * @Route("/admin/export", name="admin_export")
     */
    public function index()
    {
        //get data from repository
        $doctrineRegistrations = $this->getDoctrine()->getRepository(Registrierung::class)->findAll();

        //build assoc array
        $assocRegistrations = $this->buildRegistrationsAsAssocArray($doctrineRegistrations);

        //build export strings
        $exportStrings = $this->buildRegistrationStrings($assocRegistrations);

        return $this->render('admin_export/index.html.twig', [
            'controller_name' => 'AdminCreateImportController',
            'import_strings' => $exportStrings
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
                '%mitteilung%' => $registration->getMitteilung(),
                '%wohnheim%' => $registration->getWohnheim(),
                '%eintritt_am%' => $registration->getEintrittAm()->format('d.m.Y'),
                '%eq_massnahme%' => 0,
                '%nachname%' => $schueler->getNachname(),
                '%vorname%' => $schueler->getVorname(),
                '%rufname%' => $schueler->getRufname(),
                '%email%' => $schueler->getEmail(),
                '%geburtsdatum%' => $schueler->getGeburtsdatum()->format('d.m.Y'),
                '%geschlecht%' => 'm',
                '%geburtsort%' => $schueler->getGeburtsort(),
                '%umschueler%' => $schueler->getUmschueler() != null ? 'Y' : 'N'
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

                    $registrationData[$baseKey . '_anrede%'] = $kontaktPerson->getVorname();
                    $registrationData[$baseKey . '_vorname%'] = $kontaktPerson->getVorname();
                    $registrationData[$baseKey . '_nachname%'] = $kontaktPerson->getNachname();
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

                //Beruf
                $beruf = $ausbildung->getBeruf();

                $registrationData['%beruf_bezeichnung%'] = $beruf->getBezeichnung();
                $registrationData['%beruf_klasse%'] = $beruf->getKlasse();

                //Betrieb
                $betrieb = $ausbildung->getBetrieb();

                $registrationData['%betrieb_kammer%'] = $betrieb->getKammer();



            }


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

    private function getExportTemplate()
    {
        return preg_replace("/\r|\n/", "",
            file_get_contents(APPLICATION_PATH . '/export-template.txt')
        );
    }

}
