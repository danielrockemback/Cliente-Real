<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\Testimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('shortDescripton')
            ->add('fullDescription')
            ->add('status',  ChoiceType::class, [
                'choices'  => [
                    'Inativo' => 0,
                    'Ativo' => 1,
                ]
            ])
            ->add('highlighted',  ChoiceType::class, [
                'choices'  => [
                    'Não' => 0,
                    'Sim' => 1,
                ]
            ])
            ->add('position')
            ->add('imageFile', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])
            ->add('language', ChoiceType::class, [
                'choices'  => LanguageEnum::getOptions(),
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
