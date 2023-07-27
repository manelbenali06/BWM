<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add(
            'email', null,[
            'label' => 'Adresse e-mail',
            'attr' => 
                [ 'placeholder' => 'Entrez votre adresse e-mail',
                ],
            ])
            ->add('CreatedAt', DateTimeType::class, [
                'label' => 'Date et heure :',
                'widget' => 'single_text',
                'required' => true,
                'attr' => ['autocomplete' => 'off'],
                'input' => 'datetime_immutable',
            ])
        ->add(
            'isVerified',CheckboxType::class, [
            'label' => 'Vérifié', 
            'required' => false, 
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