<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => false,
                'label' => 'Votre Prénom',
                'attr' => ['placeholder' => 'Tapez votre Prénom ici']
            ])
            ->add('lastName', TextType::class, [
                'required' => false,
                'label' => 'Votre Nom',
                'attr' => ['placeholder' => 'Tapez votre Nom ici']
            ])
            ->add('country', TextType::class, [
                'required' => false,
                'label' => 'Pays de livraison',
                'attr' => ['placeholder' => 'Tapez le pays de livraison']
            ])
            ->add('city', TextType::class, [
                'required' => false,
                'label' => 'Ville de Livraison',
                'attr' => ['placeholder' => 'Tapez la ville de livraison']
            ])
            ->add('postalCode', TextType::class, [
                'required' => false,
                'label' => 'Code postal de la ville',
                'attr' => ['placeholder' => 'Tapez le code postal']
            ])
            ->add('street', TextType::class, [
                'required' => false,
                'label' => 'Numéro et rue',
                'attr' => ['placeholder' => 'Tapez la rue et le numéro']
            ])
            ->add('phoneNumber', TextType::class, [
                'required' => false,
                'label' => 'Votre numéro de téléphone',
                'attr' => ['placeholder' => 'Tapez votre numéro ici']
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'Votre email',
                'attr' => ['placeholder' => 'Tapez votre email ici']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe sont différents !',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'mapped' => false,
                'first_options'  => ['label' => 'Mot-de-passe'],
                'second_options' => ['label' => 'Confirmer mot-de-passe'],
            ])            
            // ->add('plainPassword', PasswordType::class, [
            //     'mapped' => false,
            //     'required' => false,
            //     'label' => 'Votre mot -de-passe',
            //     'attr' => ['placeholder' =>'Tapez votre mot-de-passe ici', 'autocomplete' => 'new-password'],
            //     'constraints' => [
            //         new NotBlank([
            //             'message' => 'Le mot de passe est obligatoire',
            //         ]),
            //         new Length([
            //             'min' => 6,
            //             'minMessage' => 'Votre mot de passe doit faire au moins {{ limit }} caractères.',
            //             // max length allowed by Symfony for security reasons
            //             'max' => 4096,
            //         ]),
            //     ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
