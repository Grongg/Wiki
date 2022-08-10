<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'example@example.com'
                ]
            ])
            ->add('name',TextType::class,[
                'required' => false,
                'label' => 'Nom complet',
                'attr' => [
                    'placeholder' => 'John Doe'
                ]
            ])
            ->add('pseudo',TextType::class,[
                'required' => false,
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'JohnDoe1234'
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
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accepter les CGU',
                'required' => true,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez accepter les CGU.'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
