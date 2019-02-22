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
            ->add('name', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('ansprPartner', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('strasse', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('hsnr', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('plz', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('ort', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('telZentrale', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('telDurchwahl', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('fax', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('email', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('gemeindeschluessel', null, [
                'attr' => ['class' => 'betrieb_item']
            ])
            ->add('kammer', null, [
                'attr' => ['class' => 'betrieb_item']
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betrieb::class
        ]);
    }
}
