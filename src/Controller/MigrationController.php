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
        /* `schulanmeldung_alt`.`betriebedaten` */
        $betriebedaten = array(
            array('B_SCHLUESSEL' => '','B_NAME1' => 'name1','B_NAME2' => 'name2','B_NAME4' => 'name4','B_PLZ' => 'plz','B_ORT' => 'ort','B_STRASSE' => 'strasse','B_TELEFON1' => 'tel1','B_TELEFON2' => 'tel2','B_TELEFON3' => 'tel3','B_E_MAIL' => 'email','B_GEMEINDEKZ' => 'gkz','B_BBIG' => '123'),
            array('B_SCHLUESSEL' => '','B_NAME1' => 'name1','B_NAME2' => 'name2','B_NAME4' => 'name4','B_PLZ' => 'plz','B_ORT' => 'ort','B_STRASSE' => 'strasse','B_TELEFON1' => 'tel1','B_TELEFON2' => 'tel2','B_TELEFON3' => 'tel3','B_E_MAIL' => 'email','B_GEMEINDEKZ' => 'gkz','B_BBIG' => '123')
        );

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
        /* `schulanmeldung_alt`.`herkunftsschulen` */
        $herkunftsschulen = array(
            array('HKS_NUMMER' => '34','HKS_NAME' => 'adfa','HKS_STRASSE' => 'asdf','HKS_PLZ' => 'sd','HKS_ORT' => 'asdfa'),
            array('HKS_NUMMER' => 'sd','HKS_NAME' => 'adf','HKS_STRASSE' => 'adsfa','HKS_PLZ' => 'asd','HKS_ORT' => 'adsf')
        );


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
