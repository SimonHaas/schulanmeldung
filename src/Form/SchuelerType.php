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
                    'divers' => 'D'
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
                'input' => 'datetime',
                'html5' => false,
                'format' => 'dd.MM.yyyy'
            ])
            ->add('geburtsort')
            ->add('geburtsland', CountryType::class, [
                'placeholder' => 'Geburtsland...',
                'choice_translation_locale' => 'de',
                'preferred_choices' => ['Deutschland' => "DE"]
            ])
            ->add('zuzugAm', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'input' => 'datetime',
                'format' => 'MM.yyyy',
                'required' => false,
            ]);
            $builder->add('staatsangehoerigkeit', CountryType::class, [
                'placeholder' => 'Auswählen...',
                'choice_translation_locale' => 'de'
            ])
            ->add('bekenntnis', ChoiceType::class, [
                'placeholder' => 'Bekenntnis...',
                'choices' => Schueler::getBekenntnisse()
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
