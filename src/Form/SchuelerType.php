<?php

namespace App\Form;

use App\Entity\Schueler;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                    'Apache-Kampfhubschrauber' => 'A',
                    'andere' => 'D'
                ]
            ])
            ->add('strasse')
            ->add('hsnr')
            ->add('plz')
            ->add('ort')
            ->add('tel')
            ->add('email', EmailType::class)
            ->add('geburtsdatum')
            ->add('geburtsort')
            ->add('geburtsland', CountryType::class, [
                'placeholder' => 'Geburtsland...',
                'choice_translation_locale' => 'de',
                'preferred_choices' => ['Deutschland' => "DE"]
            ])
            ->add('staatsangehoerigkeit')
            ->add('bekenntnis', ChoiceType::class, [
                'placeholder' => 'Bekenntnis...',
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
