<?php

namespace App\Form;

use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AllgemeinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('eintrittAm', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'input' => 'datetime',
                'format' => 'dd.mm.yyyy'
            ])
            ->add('wohnheim', CheckboxType::class, [
                'required' => false
            ])
            ->add('mitteilung', TextareaType::class, [
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {}
}
