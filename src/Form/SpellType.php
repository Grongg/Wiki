<?php

namespace App\Form;

use App\Entity\Spell;
use App\Entity\Champion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SpellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'required' => false,
                'label' => 'Nom du produit',
                'attr' => [
                    'placeholder' => 'Taper le nom ici...'
                ]
            ])
            ->add('isActive')
            ->add('isPassive')
            ->add('resume')
            ->add('spellImage')
            ->add('cost')
            ->add('type')
            ->add('cooldown')
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
