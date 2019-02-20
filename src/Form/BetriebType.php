<?php

namespace App\Form;

use App\Entity\Betrieb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetriebType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('ansprPartner')
            ->add('strasse')
            ->add('hsnr')
            ->add('plz')
            ->add('ort')
            ->add('telZentrale')
            ->add('telDurchwahl')
            ->add('fax')
            ->add('email')
            ->add('istVerifiziert')
            ->add('kammer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betrieb::class,
        ]);
    }
}
