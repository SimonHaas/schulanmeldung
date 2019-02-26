<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchuelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vorname', null, [
                'label' => 'Vornamen',
                'help' => 'Alle Vornamen'
            ])
            ->add('rufname')
            ->add('nachname')
            ->add('geschlecht', ChoiceType::class, [
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'männlich' => 'M',
                    'weiblich' => 'W',
                    'andere' => 'D'
                ]
            ])
            ->add('strasse')
            ->add('hsnr')
            ->add('plz')
            ->add('ort')
            ->add('tel', TelType::class)
            ->add('email', EmailType::class)
            ->add('geburtsdatum', BirthdayType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'input' => 'datetime',
                'format' => 'dd.mm.yyyy'
            ])
            ->add('geburtsort')
            ->add('geburtsland', CountryType::class, [
                'placeholder' => 'Auswählen...',
                'choice_translation_locale' => 'de',
                'preferred_choices' => ['Deutschland' => "DE"]
            ])
            ->add('zuzugAm', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'input' => 'datetime',
                'format' => 'mm.yyyy',
                'required' => false
            ])
            ->add('staatsangehoerigkeit', CountryType::class, [
                'placeholder' => 'Auswählen...',
                'choice_translation_locale' => 'de'
            ])
            ->add('bekenntnis', ChoiceType::class, [
                'placeholder' => 'Auswählen...',
                'choices' => [
                    'römisch-katholisch' => 'RK',
                    'evangelisch' => 'RV',
                    'evang.-meth.' => 'EM',
                    'freie ev. Gemeinde' => 'EF',
                    'evang.-freikirchlich' => 'BE',
                    'evang.-reformiert' => 'ER',
                    'islamisch' => 'IL',
                    'russisch-orthodox' => 'RO',
                    'griechisch-orthodox' => 'GO',
                    'serbisch-orthodox' => 'SE',
                    'rumänisch-orthodox' => 'UO',
                    'syrisch-orthodox' => 'SY',
                    'Zeugen Jehova' => 'ZJ',
                    'israelisch' => 'IS',
                    'neuapostolisch' => 'NA',
                    'Sieben Tags-Adven.' => 'ST',
                    'altkatholisch' => 'AK',
                    'bekenntnislos' => 'BL',
                    'sonstige' => 'SO'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schueler::class,
        ]);
    }
}
