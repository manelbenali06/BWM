<?php

namespace App\Form;
use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EditPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('oldPassword', PasswordType::class, [
            'label' => 'Ancien mot de passe',
            'mapped' => false,
            'required' => true,
            'attr' => [
            'class' => 'form-control'
            ]
        ])
        ->add('newPassword', PasswordType::class, [
            'label' => 'Nouveau mot de passe',
            'mapped' => false,
            'required' => true,
            'attr' => [
            'class' => 'form-control'
            ]
        ])
        ->add('confirmPassword', PasswordType::class, [
            'label' => 'Confirmer le mot de passe',
            'mapped' => false,
            'required' => true,
            'attr' => [
            'class' => 'form-control'
            ]
        ])
        ->add('save', SubmitType::class, [
            'label' => 'Sauvegarder',
            'attr' => ['class' => 'btn'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        'data_class' => User::class,
        ]);
    }
}