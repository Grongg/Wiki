<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EditProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'required' => false,
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'nouveau pseudo'
                ],
            ])
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'nouveau nom'
                ],
            ])
            ->add('avatarFile',FileType::class,[
                'mapped' => false,
                'required' => false,
                'label' => 'Upload un avatar',
                'constraints' => [
                    new File([
                        'maxSize' => '1m',
                        'maxSizeMessage' => 'Le poids ne peut pas depasser 1mo, le fichier est trop lourd'
                    ])
                ]
            ])
            ->add('coverFile',FileType::class,[
                'mapped' => false,
                'required' => false,
                'label' => 'Upload une couverture',
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
            // Configure your form options here
        ]);
    }
}