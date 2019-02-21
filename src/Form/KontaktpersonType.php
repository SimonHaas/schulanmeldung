<?php

namespace App\Form;

use App\Entity\Kontaktperson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KontaktpersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anrede', ChoiceType::class, [
                'choices'  => [
                    'Herr' => 'Herr',
                    'Frau' => 'Frau',
                ],
                'attr' => ['class' => 'custom-select'],
            ])
            ->add('vorname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('strasse', TextType::class)
            ->add('hausnummer', TextType::class)
            ->add('plz', NumberType::class)
            ->add('ort', TextType::class)
            ->add('telefonnummer', NumberType::class)
            ->add('email', EmailType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Create',
                'attr' => ['class' => 'btn btn-info btn-block pull-right'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kontaktperson::class,
        ]);
    }
}
