<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            $builder->create('schueler', FormType::class, ['label' => '1. Daten des Schülers'])
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
        )->add(
            $builder->create('adresse', FormType::class, ['label' => '2. Adresse des Schülers'])
            ->add('email1', EmailType::class, $options['email'])
            ->add('strasse', TextType::class, $options['strasse'])
            ->add('plz', IntegerType::class, $options['plz'])
            ->add('ort', TextType::class, $options['ort'])
            ->add('telefon', TextType::class, $options['telefon'])
        )->add(
            $builder->create('erziehungsberechtigte', FormType::class, ['label' => '3. Erziehungsberechtigte / Vormund'])
                ->add(
                    $builder->create('erzberech1', FormType::class, ['label' => 'Erster Erziehungsberechtigter'])
                    ->add('erziehungsberechtigter1_art', ChoiceType::class, $options['eltern_art'])
                    ->add('erziehungsberechtigter1_anrede', ChoiceType::class, $options['anrede'])
                    ->add('erziehungsberechtigter1_familienname', TextType::class, $options['familienname'])
                    ->add('erziehungsberechtigter1_rufname', TextType::class, $options['rufname'])
                    ->add('erziehungsberechtigter1_telefon', TextType::class, $options['telefon'])
                )->add(
                    $builder->create('erzberech2', FormType::class, ['label' => 'Zweiter Erziehungsberechtigter'])
                    ->add('erziehungsberechtigter2_art', ChoiceType::class, $options['eltern_art'])
                    ->add('erziehungsberechtigter2_anrede', ChoiceType::class, $options['anrede'])
                    ->add('erziehungsberechtigter2_familienname', TextType::class, $options['familienname'])
                    ->add('erziehungsberechtigter2_rufname', TextType::class, $options['rufname'])
                    ->add('erziehungsberechtigter2_telefon', TextType::class, $options['telefon'])
                )->add(
                    $builder->create('anschrift_erzberech', FormType::class, ['label' => 'Anschrift des/der Erziehungsberechtigten'])
                    ->add('anschrift_eltern_gleich_schueler', CheckboxType::class, $options['anschrift_eltern_gleich_schueler'])
                    ->add('anschrift2_strasse', TextType::class, $options['strasse'])
                    ->add('anschrift2_plz', IntegerType::class, $options['plz'])
                    ->add('anschrift2_ort', TextType::class, $options['ort'])
                    ->add('anschrift2_telefon', TextType::class, $options['telefon'])
                    ->add('email2', EmailType::class, $options['email'])
                )
        )->add(
            $builder->create('gastschueler', FormType::class, ['label' => '4. Gast-/Umschüler'])
            ->add('gastschueler', CheckboxType::class, $options['gastschueler'])
            ->add('umschueler', CheckboxType::class, $options['umschueler'])
            ->add('kostentraeger', TextType::class, $options['kostentraeger'])
            ->add('traegersitz', TextType::class, $options['traegersitz'])
            ->add('foerderungsnummer', TextType::class, $options['foerderungsnummer'])
            ->add('schulpflicht', CheckboxType::class, $options['schulpflicht'])
            ->add('tagesheim', CheckboxType::class, $options['tagesheim'])
        )->add(
            $builder->create('ausbildung', FormType::class, ['label' => '5. Berufsausbildung/-tätigkeit'])
            ->add('ausbildung_beginn', DateType::class, $options['ausbildung_beginn'])
            ->add('ausbildung_ende', DateType::class, $options['ausbildung_ende'])
            ->add('ausbildung_dauer', ChoiceType::class, $options['ausbildung_dauer'])
            ->add('betrieb_name1', TextType::class, $options['betrieb_name1'])
            ->add('betrieb_name2', TextType::class, $options['betrieb_name2'])
            ->add('betrieb_strasse', TextType::class, $options['strasse'])
            ->add('betrieb_plz', IntegerType::class, $options['plz'])
            ->add('betrieb_ort', TextType::class, $options['ort'])
            ->add('betrieb_telefon1', TextType::class, $options['betrieb_telefon1'])
            ->add('betrieb_telefon2', TextType::class, $options['betrieb_telefon2'])
            ->add('betrieb_telefon3', TextType::class, $options['betrieb_telefon3'])
            ->add('betrieb_email', EmailType::class, $options['email'])
            ->add('kammer', TextType::class, $options['kammer'])
        )->add(
            $builder->create('vorbildung', FormType::class, ['label' => '6. Schulische Vorbildung'])
            ->add('eintrittsdatum', DateType::class, $options['eintrittsdatum'])
            ->add('von_schulart', ChoiceType::class, $options['von_schulart'])
            ->add('von_schulnummer', IntegerType::class, $options['von_schulnummer'])
            ->add('schul_vorbild', ChoiceType::class, $options['schul_vorbild'])
            ->add('vorbild_schul', ChoiceType::class, $options['vorbild_schul'])
            ->add('sv_slbschule1', TextType::class, $options['sv_slbschule'])
            ->add('sv_slbschule1eintritt', DateType::class, $options['sv_slbschuleeintritt'])
            ->add('sv_slbschule1austritt', DateType::class, $options['sv_slbschuleaustritt'])
            ->add('sv_slbschule2', TextType::class, $options['sv_slbschule'])
            ->add('sv_slbschule2eintritt', DateType::class, $options['sv_slbschuleeintritt'])
            ->add('sv_slbschule2austritt', DateType::class, $options['sv_slbschuleaustritt'])
            ->add('sv_slbschule3', TextType::class, $options['sv_slbschule'])
            ->add('sv_slbschule3eintritt', DateType::class, $options['sv_slbschuleeintritt'])
            ->add('sv_slbschule3austritt', DateType::class, $options['sv_slbschuleaustritt'])
            ->add('sv_slbschule4', TextType::class, $options['sv_slbschule'])
            ->add('sv_slbschule4eintritt', DateType::class, $options['sv_slbschuleeintritt'])
            ->add('sv_slbschule4austritt', DateType::class, $options['sv_slbschuleaustritt'])
        )
            ->add('kommentar', TextareaType::class, $options['kommentar'])
            ->add('submit', SubmitType::class)
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
            'eltern_art' => array(
                'choices' => array(
                    'Eltern' => 1,
                    'Vater' => 2,
                    'Mutter' => 3,
                    'Vormund' => 4,
                    'Verwandter' => 5,
                    'Pflegeeltern' => 6,
                    'sonstige Unterkunft' => 7
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Art',
                'required' => true
            ),
            'anschrift_eltern_gleich_schueler' => array(
                'label' => 'Adresse stimmt mit der des Schülers überein'
            ),
            'gastschueler' => array(
                'label' => "Gast-/Sprengelschüler"
            ),
            'umschueler' => array(
                'label' => 'Umschüler'
            ),
            'kostentraeger' => array(
                'label' => "Kostenträger",
                'required' => true
            ),
            'traegersitz' => array(
                'label' => "Trägersitz",
                'required' => true
            ),
            'foerderungsnummer' => array(
                'label' => "Förderungsnummer",
                'required' => true
            ),
            'schulpflicht' => array(
                'label' => 'Schulpflicht erfüllt'
            ),
            'tagesheim' => array(
                'label' => 'Unterbringung in Wohnheim gewünscht'
            ),
            'ausbildung_beginn' => array(
                'format' => 'dd MM yyyy',
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-2, date('Y')+6),
                'label' => 'Ausbildungsbeginn (lt. Vertrag)',
                'required' => true
            ),
            'ausbildung_ende' => array(
                'format' => 'dd MM yyyy',
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y'), date('Y')+5),
                'label' => 'Ausbildungsende (lt. Vertrag)',
                'required' => true
            ),
            'ausbildung_dauer' => array(
                'choices' => array(
                    '1' => 1,
                    '1,5' => 1.5,
                    '2' => 2,
                    '2,5' => 2.5,
                    '3' => 3,
                    '3.5' => 3.5
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Ausbildungsdauer (in Jahren)',
                'required' => true
            ),
            'betrieb_name1' => array(
                'label' => 'Name des Betriebes',
                'required' => false
            ),
            'betrieb_name2' => array(
                'label' => 'Ansprechpartner (Ausbilder, Meister, ...)',
                'required' => false
            ),
            'betrieb_telefon1' => array(
                'label' => 'Telefon Zentrale',
                'required' => true
            ),
            'betrieb_telefon2' => array(
                'label' => 'Telefon mit Durchwahl',
                'required' => false
            ),
            'betrieb_telefon3' => array(
                'label' => 'Faxnummer'
            ),
            'kammer' => array(
                'label' => 'Kammer',
                'required' => false
            ),
            'eintrittsdatum' => array(
                'format' => 'dd MM yyyy',
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-4, date('Y')+3),
                'label' => 'Eintritt in die Berufsschule I Bayreuth am',
                'required' => true
            ),
            'von_schulart' => array(
                'choices' => array(
                    'allgemeinbildende Schule' => 1,
                    'Berufsschule' => 2,
                    'Wirtschaftsschule' => 3,
                    'Fachoberschule' => 4,
                    'BVJ der BS' => 5,
                    'Berufsfachschule' => 6,
                    'sonstige Schule' => 7,
                    'Maßnahme der Agentur für Arbeit' => 8,
                    'keine Schule' => 9

                ),
                'placeholder' => 'auswählen...',
                'label' => 'Am 20.10 des Vorjahres besuchte Schulart',
                'required' => true
            ),
            'von_schulnummer' => array(
                'label' => 'Nummer der zuletzt besuchten Schule/Ort',
                'disabled' => true
            ),
            'schul_vorbild' => array(
                'choices' => array(
                    'erfüllte Schulpflicht ohne Abschluss' => 1,
                    'erfolgreicher Hauptschulabschluss (ohne Quali)' => 2,
                    'qualifizierter Hauptschulabschluss (mit Quali)' => 3,
                    'mittlerer Bildungsabschluss' => 4,
                    'Fachhochschulreife' => 5,
                    'Allgemeine Hochschulreife' => 6,
                    'Fachgebundene Hochschulreife' => 7,
                    'Abschluss der Schule zur indiv. Lernförderung' => 8,
                    'sonstiger Abschluss' => 9
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Höchster bisher erreichter Schulabschluss',
                'required' => true
            ),
            'vorbild_schul' => array(
                'choices' => array(
                    'Hauptschule oder Mittelschule' => 1,
                    'Volksschule zur sonderpäd. Förderung' => 2,
                    'Realschule' => 3,
                    'Wirtschaftsschule' => 4,
                    'Gymnasium' => 5,
                    'Berufsschule' => 6,
                    'Berufsschule zur sonderpäd. Förderung' => 7,
                    'Fachoberschule' => 8,
                    'sonstige Schule' => 9
                ),
                'placeholder' => 'auswählen...',
                'label' => 'Der Abschluss wurde absolviert an',
                'required' => true
            ),
            'sv_slbschule' => array(
                'label' => 'Schulname und Ort'
            ),
            'sv_slbschuleeintritt' => array(
                'format' => 'dd MM yyyy',
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-40, date('Y')),
                'label' => 'Eintritt'
            ),
            'sv_slbschuleaustritt' => array(
                'format' => 'dd MM yyyy',
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-40, date('Y')),
                'label' => 'Austritt'
            ),
            'kommentar' => array(
                'label' => 'Mitteilung an die Schule allgemein: (Mitteilung zu Flüchtlingen: Bitte geben Sie den Namen der anmeldenden Stelle, Ansprechpartner und Ihre Telefonnummer ein!)',
                'required' => false
            )
        ]);
    }
}
