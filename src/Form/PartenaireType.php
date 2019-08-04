<?php

namespace App\Form;

use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom', TextType::class)
            ->add('Nom', TextType::class)
            ->add('password', TextType::class)
            ->add('Telephone', TextType::class)
            ->add('CNI', TextType::class)
            ->add('NINEA', TextType::class)
            ->add('Adresse', TextType::class)
            ->add('RaisonSocial', TextType::class)
            ->add('Email', TextType::class)
            ->add('superAdmin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partenaire::class,
        ]);
    }
}
