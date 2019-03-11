<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VorbildungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('letzteSchulart', ChoiceType::class, [
                'choices' => Schueler::getLetzteSchularten(),
                'placeholder' => 'Auswählen...'
            ])
            ->add('hoechsterAbschluss', ChoiceType::class, [
                'choices' => Schueler::getHoechsteAbschluesse(),
                'placeholder' => 'Auswählen...'
            ])
            ->add('hoechAbschlAn', ChoiceType::class, [
                'choices' => Schueler::getHoechsteAbschluesseAn(),
                'placeholder' => 'Auswählen...'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
