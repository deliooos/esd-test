<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('founder', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'Bill Gates' => 'Bill Gates',
                    'Steve Jobs' => 'Steve Jobs',
                    'Jack Wayman' => 'Jack Wayman',
                ],
                'choice_attr' => [
                    'Bill Gates' => ['class' => 'bill-gates'],
                    'Steve Jobs' => ['class' => 'steve-jobs'],
                    'Jack Wayman' => ['class' => 'jack-wayman'],
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('year', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    '1973' => '1973',
                    '1970' => '1970',
                    '1967' => '1967',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('city', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'Los Angeles' => 'Los Angeles',
                        'New York' => 'New York',
                    'Chicago' => 'Chicago',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('tech', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                    'RDS' => 'RDS',
                    'MP3' => 'MP3',
                    'DVD' => 'DVD',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
            ->add('presidentInterventions', ChoiceType::class, [
                'multiple' => false,
                'expanded' => true,
                'choices' => [
                        'Keynotes' => 'Keynotes',
                    'Tech Talks' => 'Tech Talks',
                    'Pitchs' => 'Pitchs',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
