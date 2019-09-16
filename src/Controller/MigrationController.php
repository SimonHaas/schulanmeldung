<?php

namespace App\Controller;

use App\Entity\Beruf;
use App\Entity\Betrieb;
use App\Entity\Schule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/migration")
 */
class MigrationController extends AbstractController
{
    /**
     * @Route("/berufe")
     */
    public function berufe()
    {
        $path = APPLICATION_PATH . '/berufekennungen.json';
        
        $entries = self::parseFile($path);

        $entityManager = $this->getDoctrine()->getManager();
        $migrationCount = 0;
        foreach ($entries as $entry)
        {
            $item = json_decode($entry, true);

            $beruf = new Beruf();
            $beruf->setBezeichnung($item['AB_BEZEICHNG']);
            $beruf->setNummer($item['AB_NR']);
            $beruf->setKlasse($item['Klasse']);
            $entityManager->persist($beruf);

            $migrationCount++;
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'berufe',
            'count' => $migrationCount
        ]);
    }

    /**
     * @Route("/betriebe")
     */
    public function betriebe()
    {
        $path = APPLICATION_PATH . '/betriebedaten.json';

        $entries = self::parseFile($path);

        $entityManager = $this->getDoctrine()->getManager();
        $migrationCount = 0;
        foreach ($entries as $entry)
        {
            $item = json_decode($entry, true);

            $betrieb = new Betrieb();
            $betrieb
                ->setName($item['B_NAME1'] . ' ' . $item['B_NAME2'])
                ->setStrasse($item['B_STRASSE'])
                ->setPlz($item['B_PLZ'])
                ->setOrt($item['B_ORT'])
                ->setTelZentrale($item['B_TELEFON1'])
                ->setTelDurchwahl($item['B_TELEFON2'])
                ->setFax($item['B_TELEFON3'])
                ->setEmail($item['B_E_MAIL'])
                ->setGemeindeschluessel($item['B_GEMEINDEKZ'])
                ->setKammer($item['B_BBIG'])
                ->setAnsprPartner($item['B_NAME4'])
                ->setIstVerifiziert(true);

            $entityManager->persist($betrieb);

            $migrationCount++;
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'betriebe',
            'count' => $migrationCount
        ]);
    }

    /**
     * @Route("/schulen")
     */
    public function schulen()
    {
        $path = APPLICATION_PATH . '/herkunftsschulen.json';
        
        $entries = self::parseFile($path);

        $entityManager = $this->getDoctrine()->getManager();
        $migrationCount = 0;
        foreach ($entries as $entry)
        {
            $item = json_decode($entry, true);

            $schule = new Schule();
            $schule
                ->setNummer($item['HKS_NUMMER'])
                ->setName($item['HKS_NAME'])
                ->setStrasse($item['HKS_STRASSE'])
                ->setPlz($item['HKS_PLZ'])
                ->setOrt($item['HKS_ORT'])
                ->setArt('noch nicht definiert')
                ->setIstVerifiziert(true);

            $entityManager->persist($schule);
            $migrationCount++;
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'schulen',
            'count' => $migrationCount
        ]);
    }

    private static function parseFile($path)
    {
        $content = file_get_contents($path);
        
        // Der Export ist kein valides JSON, deshalb das komplizierte Parsing.
        $entries = explode('}', $content);

        // 1. entry
        $entries[0] = $entries[0] . '}';
        $entries[0] = substr($entries[0], 1);

        // other entries
        for($i = 1; $i < sizeof($entries); $i++) {
            $entries[$i] = substr($entries[$i], 1);
            $entries[$i] = $entries[$i] . '}';
        }
        
        // last element is only a square bracket
        array_pop($entries);

        return $entries;
    }
}
