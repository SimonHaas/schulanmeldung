<?php

namespace App\Form;

use App\Entity\Fluechtling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FluechtlingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deutschKenntnis', ChoiceType::class, [
                'choices' => [
                    'keine' => 0,
                    'sehr schlecht' => 1,
                    'eher schlecht' => 2,
                    'durchschnittlich' => 3,
                    'eher gut' => 4,
                    'sehr gut' => 5
                ],
                'placeholder' => 'Auswählen...',
                'expanded' => true
            ])
            ->add('anmeldeStelle')
            ->add('ansprechPartner')
            ->add('tel', TelType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fluechtling::class,
        ]);
    }
}
