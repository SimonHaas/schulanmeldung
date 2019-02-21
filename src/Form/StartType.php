<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typ', ChoiceType::class, [
                'label' => 'Art der Beschäftigung',
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'Ausbildung mit Ausbildungsvertrag / EQ-Maßnahme' => 'AUAU',
                    'Umschüler mit Vertrag' => 'UM',
                    'Berufsgrundschuljahr Bautechnik / Holz - Zimmerer' => 'BGJs',
                    'ohne Berufstätigkeit und arbeitslos' => 'OBA',
                    'ungelernte Arbeitskräfte' => 'UAR',
                    'Mithelfende Familienangehörige' => 'MF',
                    'Ausbildung mit Praktikumsvertrag' => 'AUPR',
                    'Berufsvorbereitungsjahr' => 'BVJ',
                    'Klasse für Flüchtlinge und Asylbewerber' => 'BIK'
                ]
            ])->add('istEQMassnahme', CheckboxType::class, [
                'label' => 'EQ-Maßnahme',
                'required' => false
            ])->add('submit', SubmitType::class, [
                'label' => 'Weiter'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
