<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\TimeLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('status',  ChoiceType::class, [
                'choices'  => [
                    'Inativo' => 0,
                    'Ativo' => 1,
                ]
            ])
            ->add('position')
            ->add('language', ChoiceType::class, [
                'choices'  => LanguageEnum::getOptions(),
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TimeLine::class,
        ]);
    }
}
