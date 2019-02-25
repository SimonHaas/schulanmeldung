<?php

namespace App\Form;

use App\Entity\Registrierung;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrierungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum')
            ->add('mitteilung')
            ->add('wohnheim')
            ->add('eintrittAm')
            ->add('ip')
            ->add('typ')
            ->add('istEQMassnahme')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Registrierung::class,
        ]);
    }
}
