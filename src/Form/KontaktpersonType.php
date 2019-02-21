<?php

namespace App\Form;

use App\Entity\Kontaktperson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KontaktpersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anrede')
            ->add('vorname')
            ->add('nachname')
            ->add('strasse')
            ->add('hausnummer')
            ->add('plz')
            ->add('ort')
            ->add('telefonnummer')
            ->add('email')
            ->add('schueler')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kontaktperson::class,
        ]);
    }
}
