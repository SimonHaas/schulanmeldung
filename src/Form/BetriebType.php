<?php

namespace App\Form;

use App\Entity\Betrieb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetriebType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [

            ])
            ->add('strasse', null, [

            ])
            ->add('plz', null, [

            ])
            ->add('ort', null, [

            ])
            ->add('telZentrale', TelType::class, [

            ])
            ->add('ansprPartner', null, [

            ])
            ->add('telDurchwahl', TelType::class, [
                'required' => false
            ])
            ->add('fax', TelType::class, [
                'required' => false
            ])
            ->add('email', EmailType::class, [

            ])
            ->add('kammer', ChoiceType::class, [
                'placeholder' => 'Auswählen...',
                'choices' => Betrieb::getKammern()
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betrieb::class
        ]);
    }
}
