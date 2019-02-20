<?php

namespace App\Form;

use App\Entity\Herkunftsschule;
use App\Repository\HerkunftsschuleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BasicInfosType extends AbstractType
{
    //TODO refactor
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beschaeftigungsArt', ChoiceType::class, array(
                'label' => 'Beschäftigungsart',
                'choices'  => array(
                    'Ausbildung mit Ausbildungsvertrag / EQ-Maßnahme' => 'AUAU',
                    'Umschüler mit Vertrag' => 'UM',
                    'Berufsgrundschuljahr Bautechnik / Holz - Zimmerer' => 'BGJs',
                    'ohne Berufstätigkeit und arbeitslos' => 'OBA',
                    'ungelernte Arbeitskräfte' => 'UAR',
                    'Mithelfende Familienangehörige' => 'MF',
                    'Ausbildung mit Praktikumsvertrag' => 'AUPR',
                    'Berufsvorbereitungsjahr' => 'BVJ',
                    'Klasse für Flüchtlinge und Asylbewerber' => 'BIK'
                ),
            ))
            ->add('letzteSchule', ChoiceType::class, array(
                'label' => 'Zuletzt besuchte Schule',
                'choices' => $options['data']
            ))
            ->add('ausbildungsberuf', ChoiceType::class, array(
                //TODO Datenbank
                'choices' => array(
                    'test' => 'das hier'
                )
            ))
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
