<?php

namespace App\Form;

use App\Controller\BetriebController;
use App\Controller\KammerController;
use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use App\Entity\Kammer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AusbildungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('beginn')
            ->add('ende');
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

            $builder->add('betriebNeu', BetriebType::class, [
                'required' => false,
                'mapped' => false,
                'label' => false,
                'attr' => [
                    'class' => 'betriebNeu',
                    'style' => 'display:none;'
                ]
            ])

            ->add('beruf', null, [
                'placeholder' => 'Auswählen...'
            ])
            ->add('submit', SubmitType::class, ['label' => 'Weiter'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ausbildung::class,
        ])->setRequired(["betriebe", "betriebNeu"]);
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $newChoice = new ChoiceView(new Betrieb(), '0', 'Neuen Betrieb anlegen'); // <- new option
        $view->children['betrieb']->vars['choices'][] = $newChoice;//<- adding the new option
    }

}
