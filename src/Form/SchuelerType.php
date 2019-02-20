<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vorname')
            ->add('nachname')
            ->add('rufname')
            ->add('geburtsdatum')
            ->add('geburtsort')
            ->add('registrierung')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schueler::class,
        ]);
    }
}
