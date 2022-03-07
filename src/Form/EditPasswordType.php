<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class EditPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('currentPassword', PasswordType::class, [
            'label' => 'mot de passe actuel',
            'attr' => [
                'placeholder' => 'ancien mot de passe'
            ],
            'required' => false,
            'constraints' => [
                new UserPassword([
                    'message' => 'Le mot de passe incorrect'
                ])
            ]
        ])
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe doivent etre identique',
            'mapped' => false,
            'required' => false,
            'attr' => [
                'autocomplete' => 'new-password'
            ],
            'first_options' => [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'azerty'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le mot de passe est requis'
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} caractères',
                        'max' => 4096
                    ])
                ]
            ],
            'second_options' => [
                'label' => 'Confirmer votre mot de passe',
                'attr' => [
                    'placeholder' => 'confirmer mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le mot de passe est requis'
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} caractères',
                        'max' => 4096
                    ])
                ]
            ],
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
