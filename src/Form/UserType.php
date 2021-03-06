<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('Profile', TextType::class)
            ->add('Statut', TextType::class)
            ->add('imageFile', VichImageType::class)
            ->add('updatedAt',TextType::class )
            //->add('Compte', EntityType::class,['class'=>Compte::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection'=> false
        ]);
    }
}
