<?php

namespace App\Form;

use App\Entity\Schule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('art')
            ->add('strasse')
            ->add('hausnummer')
            ->add('ort')
            ->add('plz')
            ->add('istVerifiziert')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schule::class,
        ]);
    }
}
