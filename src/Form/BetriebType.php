<?php

namespace App\Form;

use App\Entity\Betrieb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetriebType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schluessel')
            ->add('name1')
            ->add('name2')
            ->add('name3')
            ->add('plz')
            ->add('strasse')
            ->add('ort')
            ->add('telefon1')
            ->add('telefon2')
            ->add('telefon3')
            ->add('email')
            ->add('gemeinde')
            ->add('bbig')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betrieb::class,
        ]);
    }
}
