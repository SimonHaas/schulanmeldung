<?php

namespace App\Form;

use App\Entity\Schulbesuch;
use App\Entity\Schule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchulbesuchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(!empty($options['schule'])) {
            $builder->add('schule', EntityType::class, [
                'class' => Schule::class,
                'choices' => $options['schulen'],
                'data' => $options['schule'],
                'group_by' => 'ort',
                'placeholder' => 'Auswählen...'
            ]);
        } else {
            $builder->add('schule', EntityType::class, [
                'class' => Schule::class,
                'choices' => $options['schulen'],
                'group_by' => 'ort',
                'placeholder' => 'Auswählen...'
            ]);
        }
        $builder
            ->add('eintritt', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
            ->add('austritt', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schulbesuch::class,
        ])->setRequired(["schulen", "schule"]);
    }
}
