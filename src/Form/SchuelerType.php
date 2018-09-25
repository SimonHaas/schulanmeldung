<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anrede')
            ->add('familienname')
            ->add('vorname')
            ->add('rufname')
            ->add('geschlecht')
            ->add('geburtsdatum')
            ->add('geburtsort')
            ->add('geburtsland')
            ->add('staat')
            ->add('bekenntnis')
            ->add('email1')
            ->add('strasse')
            ->add('plz')
            ->add('ort')
            ->add('telefon')
            ->add('anschr1_fuer1')
            ->add('anschr1_fuer2')
            ->add('erziehungsberechtigter1_art')
            ->add('erziehungsberechtigter1_anrede')
            ->add('erziehungsberechtigter1_familienname')
            ->add('erziehungsberechtigter1_rufname')
            ->add('erziehungsberechtigter1_telefon')
            ->add('email2')
            ->add('erziehungsberechtigter2_art')
            ->add('erziehungsberechtigter2_anrede')
            ->add('erziehungsberechtigter2_familienname')
            ->add('erziehungsberechtigter2_rufname')
            ->add('erziehungsberechtigter2_telefon')
            ->add('anschrift2_strasse')
            ->add('anschrift2_plz')
            ->add('anschrift2_ort')
            ->add('anschrift2_telefon')
            ->add('anschrift2_fuer1')
            ->add('anschrift2_fuer2')
            ->add('gastschueler')
            ->add('umschueler')
            ->add('kostentraeger')
            ->add('traegersitz')
            ->add('foerderungsnummer')
            ->add('schulpflicht')
            ->add('tagesheim')
            ->add('ausbildung_beginn')
            ->add('ausbildung_ende')
            ->add('ausbildung_dauer')
            ->add('ausbildung_art')
            ->add('ausbildung_beruf')
            ->add('ausbildung_betrieb')
            ->add('betrieb_name1')
            ->add('betrieb_name2')
            ->add('betrieb_strasse')
            ->add('betrieb_plz')
            ->add('betrieb_ort')
            ->add('betrieb_telefon1')
            ->add('betrieb_telefon2')
            ->add('betrieb_telefon3')
            ->add('betrieb_email')
            ->add('betrieb_bbig')
            ->add('kammer')
            ->add('eintrittsdatum')
            ->add('klasse')
            ->add('eintritt_jgst')
            ->add('von_schulart')
            ->add('von_schulnummer')
            ->add('schul_vorbild')
            ->add('vorbild_schul')
            ->add('sv_slbschule1')
            ->add('sv_slbschule1eintritt')
            ->add('sv_slbschule1austritt')
            ->add('sv_slbschule2')
            ->add('sv_slbschule2eintritt')
            ->add('sv_slbschule2austritt')
            ->add('sv_slbschule3')
            ->add('sv_slbschule3eintritt')
            ->add('sv_slbschule3austritt')
            ->add('sv_slbschule4')
            ->add('sv_slbschule4eintritt')
            ->add('sv_slbschule4austritt')
            ->add('zuzug_art')
            ->add('zuzug_datum')
            ->add('kommentar')
            ->add('anmeldedatum')
            ->add('anmeldezeit')
            ->add('deutsch')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schueler::class,
        ]);
    }
}
