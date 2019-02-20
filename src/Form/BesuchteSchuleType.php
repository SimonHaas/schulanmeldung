<?php

namespace App\Form;

use App\Entity\BesuchteSchule;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BesuchteSchuleType extends AbstractType
{
    //TODO refactor
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eintritt', DateType::class, $options['eintritt'])
            ->add('austritt', DateType::class, $options['austritt'])
            ->add('name', TextType::class, $options['name'])
            ->add('ort', TextType::class, $options['ort'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BesuchteSchule::class,
            'eintritt' => array(
                'format' => 'dd MM yyyy',
                'html5' => true,
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-40, date('Y')),
                'label' => 'Eintritt',
                'required' => true
            ),
            'austritt' => array(
                'format' => 'dd MM yyyy',
                'html5' => true,
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'
                ),
                'years' => range(date('Y')-40, date('Y')),
                'label' => 'Austritt',
                'required' => true
            ),
            'name' => array(
                'label' => 'Austritt',
                'required' => true
            ),
            'ort' => array(
                'label' => 'Austritt',
                'required' => true
            )
        ]);
    }
}
