<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form__input w-100',
                ],
                'constraints' => array(
                    new NotBlank(),
                    new Assert\Regex(
                        array(
                            'pattern' => '/^[a-zA-Z]+$/',
                            'message' => 'Le nom {{value}} n\'est pas valide',
                        )
                    ),
                ),
            ])
            ->add('prenom',TextType::class, [
                'label' => false,
                    'attr' => [
                        'placeholder' => 'Prénom',
                        'class' => 'form__input w-100',
                    ],
                    'constraints' => array(
                        new NotBlank(),
                        new Assert\Regex(
                            array(
                                'pattern' => '/^[a-zA-Z]+$/',
                                'message' => 'Le prénom {{value}} n\'est pas valide',
                            )
                        ),
                    ),
                ])  
            ->add('mail', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form__input w-100',
                ],
                'constraints' => array(
                    new NotBlank(),
                    new Assert\Regex(
                        array(
                            'pattern' => '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                            'message' => 'L\'adresse email {{ value }} n\'est pas valide'
                        )
                    ),
                ),
            ])
            ->add('tel', TelType::class, [
                'label' => false,
                'constraints' => array(
                    new NotBlank(),
                    new Assert\Regex(
                        array(
                            'pattern' => '/^0[1-9]([-. ]?[0-9]{2}){4}$/',
                            'message' => 'Ecrivez sous la forme : 0610203040',
                        )
                    ),
                ),
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'class' => 'form__input w-100',
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez acceptez nos conditions.',
                    ]),
                ],
                'label' => 'J\'accepte les conditions d\'utilisation',
                'attr' => [
                    'class' => 'form-check-input',
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => false,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                'class' => 'form__input w-100',
                'placeholder' => 'Mot de Passe',],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Rentrez un mot de passe.',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit être d\'au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            //on ajoute un groupe d'inputs nommé "Votre Adresse" contenant rue, cp, et ville
            ->add('rue', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Adresse Postale (Rue)',
                    'class' => 'form__input w-100',
                ],
                'constraints' => array(
                    new NotBlank(),
                    new Assert\Regex(
                        array(
                            //on fait un regex sous la forme "4 rue de la vertonne
                            'pattern' => '/^[0-9]+[a-zA-Z0-9\s]+$/',
                            'message' => 'Ecrivez sous la forme : 6 rue des grosses fleurs',
                        )
                    ),
                ),
            ])
            ->add('cp', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Code Postal',
                    'class' => 'form__input w-100',
                ],
                'constraints' => array(
                    new NotBlank(),
                    new Assert\Regex(
                        array(
                            'pattern' => '/^[0-9]{5}$/',
                            'message' => 'Ecrivez sous la forme : 75000',
                        )
                    ),
                ),
            ])
            ->add('ville', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form__input w-100',
                ],
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
