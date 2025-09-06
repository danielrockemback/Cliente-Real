<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\WhoWeArePage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class WhoWeArePageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('presentationPartOne')
            ->add('presentationPartTwo')
            ->add('presentationPartThree')
            ->add('youTubeVideoCode')
            ->add('imageFileOne', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])
            ->add('imageFileTwo', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])
            ->add('imageFileThree', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WhoWeArePage::class,
        ]);
    }
}
