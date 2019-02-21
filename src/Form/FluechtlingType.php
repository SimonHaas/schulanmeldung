<?php

namespace App\Form;

use App\Entity\Fluechtling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluechtlingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deutschKenntnis')
            ->add('anmeldeStelle')
            ->add('ansprechPartner')
            ->add('tel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fluechtling::class,
        ]);
    }
}
