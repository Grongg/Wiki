<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'required' => false,
                'label' => 'Nom de la catégorie',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('file',FileType::class,[
                'mapped' => false,
                'required' => false,
                'label' => 'Upload une Image',
                'constraints' => [
                    new File([
                        'maxSize' => '1m',
                        'maxSizeMessage' => 'Le poids ne peut pas depasser 1mo, le fichier est trop lourd'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
