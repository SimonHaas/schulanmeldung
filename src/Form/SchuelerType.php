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
            /*
            $formModifier = function (FormInterface $form, $geburtsland) {
                // checks if the Geburtsland is not German
                // If the Geburtsland is not German, the zuzug-field is added.
                if ($geburtsland && $geburtsland != 'DE') {
                    $form->add('zuzugAm', DateType::class, [
                        'widget' => 'single_text',
                        'html5' => false,
                        'input' => 'datetime',
                        'format' => 'mm.yyyy',
                        'required' => true
                    ]);
                }
            };

            $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($formModifier) {
                $formModifier($event->getForm(), $event->getData()->getGeburtsland());
            });

            $builder->get('geburtsland')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                    // It's important here to fetch $event->getForm()->getData(), as
                    // $event->getData() will get you the client data (that is, the ID)
                    $geburtsland = $event->getForm()->getData();
                    // since we've added the listener to the child, we'll have to pass on
                    // the parent to the callback functions!
                    $formModifier($event->getForm()->getParent(), $geburtsland);
                }
            );
            */
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
