<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typ', ChoiceType::class, [
                'label' => 'Art der Beschäftigung',
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'Ausbildung mit Ausbildungsvertrag' => 'AUAU',
                    'EQ-Maßnahme' => 'EQ',
                    'Umschüler mit Vertrag' => 'UM',
                    'Berufsgrundschuljahr Bautechnik: Holztechnik (Schreiner/Holzmechaniker)' => 'BGJH',
                    'Berufsgrundschuljahr Bautechnik: Zimmerer' => 'BGJZ',
                    'ohne Berufstätigkeit und arbeitslos' => 'OBA',
                    'ungelernte Arbeitskräfte' => 'UAR',
                    'Mithelfende Familienangehörige' => 'MF',
                    'Ausbildung mit Praktikumsvertrag' => 'AUPR',
                    'Berufsvorbereitungsjahr' => 'BVJ',
                    'Klasse für Flüchtlinge und Asylbewerber' => 'BIK'
                ]
            ])
            ->add('datenschutz', CheckboxType::class, [
                'label'    => 'Ich akzeptiere die Datenschutzbestimmungen.',
                'required' => true,
                'value' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
