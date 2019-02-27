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
            ->add('eintrittAm', DateType::class) //TODO eintritt wohin? Eindeutig benennen oder mit kurzen Text erklären
            ->add('wohnheim', CheckboxType::class) //TODO das ist required, soll es aber nicht sein
            ->add('mitteilung', TextareaType::class); //TODO das ist required, soll es aber nicht sein
        //TODO kurz erläutern wozu eine Mitteilung. Für wen? Was wäre ein Grund da was reinzuschreiben?
    }

    public function configureOptions(OptionsResolver $resolver)
    {}
}
