<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Category; // Изменил импорт на сущность Category
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Title',
                'attr'=>[
                    'placeholder'=> 'Enter title',
                    'id'=>'title',
                ],
                'constraints'=>[
                    new Length(
                    min: 5,
                    max: 100,
                    minMessage:'Your name must be at least {{ limit }} characters long',
                    maxMessage:'Your name cannot be longer than {{ limit }} characters'
                    ),
                    
                    new Regex(
                        pattern:"/[A-Za-z]/",
                        message:'Your name cannot contain a number'
                    ),
                    new NotBlank(
                        message:'Name cannot be blank'
                    )
                ]
            ])

            ->add('description', TextType::class, [
                'label'=>'Description',
                'attr'=>[
                    'placeholder'=> 'Enter description',
                    'id'=>'description',
                ],
                'constraints'=>[
                    new Length(
                    min: 5,
                    max: 100,
                    minMessage:'Your name must be at least {{ limit }} characters long',
                    maxMessage:'Your name cannot be longer than {{ limit }} characters'
                    ),
                    
                    new Regex(
                        pattern: "/[A-Za-z]/",
                        message:'Your name cannot contain a number'
                    ),
                ]
            ])

            ->add('date', DateTimeType::class, [
                'date_label'=>'Day',
            ])

            ->add('category', EntityType::class, [
                'label'=>'Category',
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder'=> 'Select category'
            ])

            ->add('Submit', SubmitType::class, [
                'label'=>"Submit",
            ])
            ->add('list', \Symfony\Component\Form\Extension\Core\Type\ButtonType::class, [
                'label' => 'View all records',
                'attr' => [
                    'formnovalidate' => 'formnovalidate',
                    'onclick' => 'window.location.href = "/admin/list"; return false;',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
