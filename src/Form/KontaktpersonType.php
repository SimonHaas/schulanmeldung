<?php

namespace App\Form;

use App\Entity\Kontaktperson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KontaktpersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('art', ChoiceType::class, [
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'Elternteil' => 'ET',
                    'Vormund' => 'VO',
                    'Verwandter' => 'VW',
                    'Pflegeeltern' => 'PF',
                    'Heimleiter' => 'HL',
                    'keine' => 'k',
                ]
            ])
            ->add('anrede', ChoiceType::class, [
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'Herr' => 'H',
                    'Frau' => 'F'
                ]
            ])
            ->add('vorname')
            ->add('nachname')
            ->add('strasse')
            ->add('hausnummer')
            ->add('plz')
            ->add('ort')
            ->add('telefonnummer', TelType::class)
            ->add('email', EmailType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kontaktperson::class,
        ]);
    }
}
