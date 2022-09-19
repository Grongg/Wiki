<?php

namespace App\Form;

use App\Entity\Spell;
use App\Entity\Champion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SpellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'required' => false,
                'label' => 'Nom du spell',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('spellId', TextType::class,[
                'required' => false,
                'label' => 'id du spell',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('isActive', CheckboxType::class,[
                'required' => false,
                'label' => 'si sort actif',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('isPassive', CheckboxType::class,[
                'required' => false,
                'label' => 'si sort passif',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('isToggle', CheckboxType::class,[
                'required' => false,
                'label' => 'si sort toggle',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('isBoth', CheckboxType::class,[
                'required' => false,
                'label' => 'si sort actif et passif',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])     
            ->add('isChampPassive', CheckboxType::class,[
                'required' => false,
                'label' => 'si sort passif du champion',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])       
            ->add('resume')
            ->add('spellImage')
            // ->add('cost')
            ->add('type')
            // ->add('cooldown', CollectionType::class, [
            //     'required' => false,
            //     'label' => 'couts du sort',
            //     ])
            ->add('champion',EntityType::class,[
                'required' => false,
                'label' => 'Champion du spell',
                'class' => Champion::class,
                'placeholder' => '-- Choisir --',
                'choice_label' => function ($champion) {
                    

                    return strtoupper($champion->getName());
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Spell::class,
        ]);
    }
}
