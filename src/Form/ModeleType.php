<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Modele;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Modèle',
                'attr' => [
                    'placeholder' => 'saisir un modèle',
                ]
            ])
            ->add('marque', EntityType::class, [
                'label' => 'Liste',
                'class' => Marque::class,
                'choice_label' => 'libelle',
                        
                'mapped' => true,
                'placeholder' => 'Choisir une marque',
                //'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Modele::class,
        ]);
    }
}
