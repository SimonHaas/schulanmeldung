<?php

namespace App\Form;

use App\Entity\Schulbesuch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchulbesuchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eintritt')
            ->add('austritt')
            ->add('schueler')
            ->add('schule')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schulbesuch::class,
        ]);
    }
}
