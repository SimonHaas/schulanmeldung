<?php

namespace App\Form;

use App\Entity\Ausbildung;
use App\Entity\Beruf;
use App\Entity\Betrieb;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AusbildungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginn', DateType::class, [
                'widget' => 'single_text',
                // 'html5' => false,
                 'input' => 'datetime',
                //  'format' => 'dd.mm.yyyy'
            ])
            ->add('ende', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
            ]);
        if(!empty($options['betriebNeu'])) {
            $builder->add('betrieb', EntityType::class, [
                'class' => Betrieb::class,
                'choices' => $options['betriebe'],
                'data' => $options['betriebNeu'],
                'group_by' => 'ort',
                'placeholder' => 'Auswählen...',
                'attr' => ['onchange' => 'toggle()']
            ]);
        } else {
            $builder->add('betrieb', EntityType::class, [
                'class' => Betrieb::class,
                'choices' => $options['betriebe'],
                'group_by' => 'ort',
                'placeholder' => 'Auswählen...',
                'attr' => ['onchange' => 'toggle()']
            ]);
        }

            $builder->add('beruf', EntityType::class, [
                'class' => Beruf::class,
                'placeholder' => 'Auswählen...'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ausbildung::class,
        ])
            ->setRequired(["betriebe", "betriebNeu"])
        ;
    }
}
