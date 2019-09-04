<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\Partenaire;
use App\Entity\UserPartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserPartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Login',TextType::class)
            ->add('password',TextType::class)
            ->add('Prenom',TextType::class)
            ->add('Nom',TextType::class)
            ->add('Telephone',TextType::class)
            ->add('Email',TextType::class)
            ->add('CNI',TextType::class)
            ->add('partenaire',EntityType::class,['class'=>Partenaire::class])
            ->add('compte',EntityType::class,['class'=>Compte::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserPartenaire::class,
        ]);
    }
}
