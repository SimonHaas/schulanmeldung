<?php

namespace App\Form;

use App\Entity\Betrieb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetriebType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [

            ])
            ->add('ansprPartner', null, [

            ])
            ->add('strasse', null, [

            ])
            ->add('hsnr', null, [

            ])
            ->add('plz', null, [

            ])
            ->add('ort', null, [

            ])
            ->add('telZentrale', null, [

            ])
            ->add('telDurchwahl', null, [

            ])
            ->add('fax', null, [

            ])
            ->add('email', null, [

            ])
            ->add('gemeindeschluessel', null, [

            ])
            ->add('kammer', ChoiceType::class, [
                'choices' => [
                    'HWK Bayreuth' => 102,
                    'IHK Bayreuth' => 153,
                    'IHK Coburg' => 154,
                    'IHK Aschaffenburg' => 151,
                    'HWK Augsburg' => 101,
                    'IHK Augsburg' => 152,
                    'IHK Lindau' => 155,
                    'IHK München' => 156,
                    'HWK Nürnberg' => 105,
                    'IHK Nürnberg' => 157,
                    'HWK Passau' => 106,
                    'IHK Passau' => 158,
                    'HWK Regensburg' => 107,
                    'IHK Regensburg' => 159,
                    'HWK Würzburg' => 108,
                    'IHK Würzburg-Schweinfurt' => 160,
                    'sonstige' => 000,
                ]
            ]);

        /*
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">
</option><option value="">sonstige
         */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Betrieb::class
        ]);
    }
}
