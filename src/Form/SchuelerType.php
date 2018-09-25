<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anrede', ChoiceType::class, $options['anrede'])
            ->add('familienname', TextType::class, $options['familienname'])
            ->add('vorname', TextType::class, $options['vorname'])
            ->add('rufname', TextType::class, $options['rufname'])
            ->add('geschlecht', ChoiceType::class, $options['geschlecht'])
            ->add('geburtsdatum', BirthdayType::class, $options['geburtsdatum'])
            ->add('geburtsort', TextType::class, $options['geburtsort'])
            ->add('geburtsland', CountryType::class, $options['geburtsland'])
            ->add('zuzug_art', ChoiceType::class, $options['zuzug_art'])
            ->add('zuzug_datum', DateType::class, $options['zuzug_datum'])
            ->add('staat', CountryType::class, $options['staat'])
            ->add('bekenntnis', ChoiceType::class, $options['bekenntnis'])
            ->add('email1', EmailType::class, $options['email'])
            ->add('strasse', TextType::class, $options['strasse'])
            ->add('plz', IntegerType::class, $options['plz'])
            ->add('ort', TextType::class, $options['ort'])
            ->add('telefon', TextType::class, $options['telefon'])
            ->add('anschr1_fuer1', ChoiceType::class, $options['anschr1_fuer1'])
            ->add('anschr1_fuer2', ChoiceType::class, $options['anschr1_fuer2'])
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
            ->add('kommentar')
            ->add('anmeldedatum')
            ->add('anmeldezeit')
            ->add('deutsch')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schueler::class,
            'anrede' => array(
                'choices' => array(
                    'Herr' => 'h',
                    'Frau' => 'f',
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Anrede',
                'required' => true
            ),
            'familienname' => array(
                'label' => 'Familienname',
                'required' => true
            ),
            'vorname' => array(
                'label' => 'Vorname',
                'required' => true
            ),
            'rufname' => array(
                'label' => 'Rufname',
                'required' => true
            ),
            'geschlecht' => array(
                'choices' => array(
                    'männlich' => 'm',
                    'weiblich' => 'w',
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Geschlecht',
                'required' => true
            ),
            'geburtsdatum' => array(
                'format' => 'dd MM yyyy',
                'widget' => 'choice',
                'years' => range(date('Y')-70, date('Y')),
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'label' => 'Geburtsdatum',
                'required' => true
            ),
            'geburtsort' => array(
                'label' => 'Geburtsort',
                'required' => true
            ),
            'geburtsland' => array(
                'placeholder' => 'auswählen...',
                'label' => 'Geburtsland',
                'required' => true,
            ),
            'zuzug_art' => array(
                'choices' => array(
                    'Aussiedler' => 'AU',
                    'Asylbewerber' => 'AB',
                    'Kriegsflüchtling' => 'KF',
                    'Ausländer' => 'AS',
                    'sonstiger Zuzug' => 'SO'
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Zuzugsart',
                'required' => false
            ),
            'zuzug_datum' => array(
                'format' => 'dd MM yyyy',
                'html5' => true,
                'years' => range(date('Y')-70, date('Y')),
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'label' => 'Zuzugsdatum',
                'required' => false
            ),
            'staat' => array(
                'placeholder' => 'auswählen...',
                'label' => 'Staatsangehörigkeit',
                'required' => true,
            ),
            'bekenntnis' => array(
                'choices' => array(
                    'römisch-katholisch' => 'RK',
                    'evangelisch' => 'EV',
                    'evangelisch-methodistisch' => 'EM',
                    'freie evangelische Gemeinde' => 'FE',
                    'evangelisch-freikirchlich' => 'EF',
                    'evangelisch-reformiert' => 'ER',
                    'islamisch' => 'IS',
                    'russisch-orthodox' => 'RU',
                    'griechisch-orthodox' => 'GO',
                    'serbisch-orthodox' => 'SE',
                    'rumänisch-orthodox' => 'RM',
                    'syrisch-orthodox' => 'SY',
                    'Zeugen Jehova' => 'ZJ',
                    'israelisch' => 'IE',
                    'neuapostolisch' => 'NA',
                    'Sieben Tags-Adventisten' => 'SA',
                    'altkatholisch' => 'AK',
                    'bekenntnislos' => 'BL',
                    'sonstige' => 'SO'
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Bekenntnis',
                'required' => true
            ),
            'email' => array(
                'label' => 'E-Mail Adresse',
                'required' => true
            ),
            'strasse' => array(
                'label' => 'Straße, Hausnummer',
                'required' => true
            ),
            'plz' => array(
                'label' => 'PLZ',
                'required' => true
            ),
            'ort' => array(
                'label' => 'Ort',
                'required' => true
            ),
            'telefon' => array(
                'label' => 'Telefon-/Handynummer',
                'required' => true
            ),
            'anschr1_fuer1' => array(
                'choices' => array(
                    'Schüler(in)' => 0
                ),
                'label' => 'Adresse gilt für ',
                'required' => true
            ),
            'anschr1_fuer2' => array(

            )
        ]);
    }
}
