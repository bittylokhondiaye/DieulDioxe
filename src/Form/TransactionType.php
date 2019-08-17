<?php

namespace App\Form;

use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type', TextType::class)
            ->add('DateTransaction', DateTimeType::class)
            ->add('Montant', NumberType::class)
            ->add('NumeroExpediteur', NumberType::class)
            /* ->add('CNIexpediteur', NumberType::class) */
            ->add('NumeroDestinataire', TextType::class)
            ->add('CNIdestinataire', NumberType::class)
            ->add('NomCompletExpediteur', TextType::class)
            ->add('NomCompletDestinataire', TextType::class)
            /* ->add('Compte', EntityType::class,['class'=>Compte::class]) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
