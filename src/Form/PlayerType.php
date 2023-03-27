<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('mail', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('age', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    '18-25' => '18-25',
                    '26-35' => '26-35',
                    '36-45' => '36-45',
                    '45 et plus' => '45 et plus',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('adress', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('country', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('secondFirstName', TextType::class, [
                'required' => false,
            ])
            ->add('secondLastName', TextType::class, [
                'required' => false,
            ])
            ->add('secondMail', EmailType::class, [
                'required' => false,
            ])
            ->add('secondAge', ChoiceType::class, [
                'placeholder' => false,
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                'choices' => [
                    '18-25' => '18-25',
                    '26-35' => '26-35',
                    '36-45' => '36-45',
                    '45 et plus' => '45 et plus',
                ],
            ])
            ->add('secondAdress', TextType::class, [
                'required' => false,
            ])
            ->add('secondCountry', TextType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
