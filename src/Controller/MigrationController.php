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
        $json = file_get_contents($path);
        $array = json_decode($json, true);

        $berufekennungen = $array[2]['data'];

        $entityManager = $this->getDoctrine()->getManager();
        foreach ($berufekennungen as $item)
        {
            $beruf = new Beruf();
            $beruf->setBezeichnung($item['AB_BEZEICHNG']);
            $beruf->setNummer($item['AB_NR']);
            $beruf->setKlasse($item['Klasse']);
            $entityManager->persist($beruf);
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'berufe',
        ]);
    }

    /**
     * @Route("/betriebe")
     */
    public function betriebe()
    {
        $path = APPLICATION_PATH . '/betriebedaten.json';
        $json = file_get_contents($path);
        $array = json_decode($json, true);

        $betriebedaten = $array[2]['data'];

        $entityManager = $this->getDoctrine()->getManager();
        foreach ($betriebedaten as $item)
        {
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
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'betriebe',
        ]);
    }

    /**
     * @Route("/schulen")
     */
    public function schulen()
    {
        $path = APPLICATION_PATH . '/herkunftsschulen.json';
        $json = file_get_contents($path);
        $array = json_decode($json, true);

        $herkunftsschulen = $array[2]['data'];

        $entityManager = $this->getDoctrine()->getManager();
        foreach ($herkunftsschulen as $item)
        {
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
        }
        $entityManager->flush();

        return $this->render('migration/index.html.twig', [
            'tabelle' => 'schulen',
        ]);
    }
}
