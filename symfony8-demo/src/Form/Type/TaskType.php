<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Dto\TaskDto;
use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Step 1: Basic Info
            ->add('task', TextType::class, [
                'attr' => ['placeholder' => 'Task Name'],
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['placeholder' => 'Task Description'],
                'row_attr' => ['class' => 'input-group mb-3'],
            ])

            // Step 2: Details
            ->add('priority', ChoiceType::class, [
                'choices' => [
                    'Low' => 'low',
                    'Medium' => 'medium',
                    'High' => 'high',
                ],
                'placeholder' => 'Select Priority',
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Pending' => 'pending',
                    'In Progress' => 'in_progress',
                    'Completed' => 'completed',
                ],
                'placeholder' => 'Select Status',
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('tags', ChoiceType::class, [
                'choices' => [
                    'Frontend' => 'frontend',
                    'Backend' => 'backend',
                    'Bug' => 'bug',
                    'Urgent' => 'urgent',
                ],
                'multiple' => true,
                'expanded' => true, // checkboxes
            ])
            ->add('assignedTo', TextType::class, [
                'attr' => ['placeholder' => 'Assigned To'],
                'row_attr' => ['class' => 'input-group mb-3'],
            ])

            // Step 3: Dates & Completion
            ->add('dueDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'To Be Completed Before',
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('isCompleted', CheckboxType::class, [
                'required' => false,
                'label' => 'Mark as Completed',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'I agree to the terms',
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Save Task',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TaskDto::class,
        ]);
    }
}
