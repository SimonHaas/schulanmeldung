<?php

namespace App\Form;

use App\Entity\FluechtlingDaten;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluechtlingDatenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deutschKenntnis')
            ->add('anmeldeStelle')
            ->add('ansprechPartner')
            ->add('tel')
            ->add('schueler')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FluechtlingDaten::class,
        ]);
    }
}
