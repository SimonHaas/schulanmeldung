<?php

namespace App\Form;

use App\Entity\Beruf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VorbildungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('letzteSchulart', ChoiceType::class, [
                'choices' => [
                    'allgemeinbildende Schule' => 'AL',
                    'Berufsschule' => 'BS',
                    'Wirtschaftsschule' => 'WS',
                    'Fachoberschule' => 'FOS',
                    'BVJ der BS.' => 'BVJ',
                    'Berufsfachschule' => 'BFS',
                    'sonstige Schule' => 'SO',
                    'Maßnahme des Arbeitsamtes' => 'AV',
                    'keine Schule' => '-'
                ],
                'placeholder' => 'Auswählen...'
            ])
            ->add('hoechsterAbschluss', ChoiceType::class, [
                'choices' => [
                    'erfüllte Schulpflicht ohne Abschluss' => 'VSo',
                    'erfolgreicher Hauptschulabschluss (ohne Quali)' => 'HSo',
                    'qualifizierter Hauptschulabschluss (mit Quali)' => 'HSq',
                    'mittlerer Bildungsabschluss' => 'M',
                    'Fachhochschulreife' => 'H',
                    'Allgemeine Hochschulreife' => 'AH',
                    'Fachgebundene Hochschulreife' => 'FH',
                    'Abschluss der Schule zur indiv. Lernförderung' => 'SVS',
                    'sonstiger Abschluss' => 'SO'

                ],
                'placeholder' => 'Auswählen...'
            ])
            ->add('hoechAbschlAn', ChoiceType::class, [
                'choices' => [
                    'Hauptschule oder Mittelschule' => 'VS',
                    'Volksschule zur sonderpäd. Förderung' => 'SVS',
                    'Realschule' => 'RS',
                    'Wirtschaftsschule' => 'WS',
                    'Gymnasium' => 'GY',
                    'Berufsschule' => 'BS',
                    'Berufsschule zur sonderpäd. Förderung' => 'SBS',
                    'Fachoberschule' => 'FOS',
                    'sonstige Schule' => 'SO'
                ],
                'placeholder' => 'Auswählen...'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
