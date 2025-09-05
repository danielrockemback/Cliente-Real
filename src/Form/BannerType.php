<?php

namespace App\Form;

use App\Entity\Banner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BannerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('subTitle')
            ->add('active',  ChoiceType::class, [
                'choices'  => [
                    'Inativo' => 0,
                    'Ativo' => 1,
                ]
            ])
            ->add('position')
            ->add('url')
            ->add('imageFile', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false, // não mostra checkbox para deletar
                'asset_helper'  => false, // se usar Asset component, pode deixar true
                'image_uri'     => false,  // mostra a imagem atual
                'download_uri'  => true,  // mostra link para download
                'download_label'=> false, // texto do link
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Banner::class,
        ]);
    }
}
