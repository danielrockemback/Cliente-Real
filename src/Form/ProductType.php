<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\Product;
use App\Entity\ProductCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status',  ChoiceType::class, [
                'choices'  => [
                    'Inativo' => 0,
                    'Ativo' => 1,
                ]
            ])
            ->add('title')
            ->add('code')
            ->add('shortDescription')
            ->add('youtubeVideoCode')
            ->add('imageFile', VichImageType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'asset_helper'  => false,
                'image_uri'     => false,
                'download_uri'  => true,
                'download_label'=> false,
            ])
            ->add('description')
            ->add('language', ChoiceType::class, [
                'choices'  => LanguageEnum::getOptions(),
            ])
            ->add('category', EntityType::class, [
                'class' => ProductCategory::class,
                'choice_label' => function  (ProductCategory $category) {
                    return $category->getTitle() . ' - ' . LanguageEnum::getDescription($category->getLanguage());
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
