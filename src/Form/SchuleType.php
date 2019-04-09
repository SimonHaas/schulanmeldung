<?php

namespace App\Form;

use App\Entity\Schule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('art', ChoiceType::class, [
                'choices' => [
                    'Hauptschule oder Mittelschule' => 'VS',
                    'Volksschule zur sonderpäd. Förderung' => 'SVS',
                    'Realschule' => 'RS',
                    'Wirtschaftsschule' => 'WS',
                    'Gymnasium' => 'GY',
                    'Berufsschule' => 'BS',
                    'Berufsschule zur sonderpäd. Förderung' => 'SBS',
                    'Fachoberschule' => 'FOS',
                    'Grundschule' => 'G',
                    'Sonstige Schule' => 'SO'
                ],
                'placeholder' => 'Auswählen...'
            ])
            ->add('strasse')
            ->add('plz')
            ->add('ort')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schule::class,
        ]);
    }
}
