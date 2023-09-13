<?php

namespace App\Form;

use App\Entity\OrderItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class OrderItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder 
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantité commandée'
            ])
            ->add('product', TextType::class, [
                'label' => 'Nom du produit'
                ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix du produit',
                'currency' => 'EUR'
            ])
            ->add('CreatedAt', DateTimeType::class, [
                'label' => 'Date et heure :',
                'widget' => 'single_text',
                'required' => true,
                'attr' => ['autocomplete' => 'off'],
                'input' => 'datetime_immutable'
            ])
            ->add('order')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OrderItem::class,
        ]);
    }
}