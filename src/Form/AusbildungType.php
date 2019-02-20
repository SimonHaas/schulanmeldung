<?php

namespace App\Form;

use App\Entity\Ausbildung;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AusbildungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginn')
            ->add('ende')
            ->add('relation')
            ->add('betrieb')
            ->add('betriebId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ausbildung::class,
        ]);
    }
}
