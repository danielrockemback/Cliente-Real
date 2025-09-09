<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\ProductCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('imageProductFile', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])
            ->add('language', ChoiceType::class, [
                'choices'  => LanguageEnum::getOptions(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductCategory::class,
        ]);
    }
}
