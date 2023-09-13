<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference', TextType::class, [
                'label' => 'Numéro de référence',
                'attr' => ['placeholder' => 'Entrez le numéro de référence']
            ])
            ->add('paidAt', DateTimeType::class, [
                   
                'html5' => false,
                'format' => 'yyyy-MM-dd HH:mm:ss',       
                'attr' => ['placeholder' => 'Enter the paidAt'],
            ])
            ->add('CreatedAt', DateTimeType::class, [
                'label' => 'Date et heure :',
                'widget' => 'single_text',
                'required' => true,
                'attr' => ['autocomplete' => 'off'],
                'input' => 'datetime_immutable'
            ])
        
            ->add('amount', MoneyType::class, [
                'label' => 'Montant',
                'currency' => 'EUR'
            ])
            ->add('user', EntityType::class, [
                'label' => 'Utilisateur',
                'class' => User::class,
                'placeholder' => 'Sélectionnez un utilisateur'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}