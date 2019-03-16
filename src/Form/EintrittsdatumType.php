<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EintrittsdatumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ersteHaelfte', DateType::class, [
                'label' => 'Eintrittsdatum bei Registrierungen am Jahres Anfang',
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
            ->add('zweiteHaelfte', DateType::class, [
                'label' => 'Eintrittsdatum bei Registrierungen am Jahres Ende',
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
