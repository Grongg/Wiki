<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email_customer', EmailType::class, [
                'label' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez ajouter un email'
                    ])
                ]
            ])
            ->add('content', CKEditorType::class, [
                'label' => false, 
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez ajouter un contenu'
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
