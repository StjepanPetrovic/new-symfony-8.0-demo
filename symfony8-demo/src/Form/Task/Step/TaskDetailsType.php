<?php

declare(strict_types=1);

namespace App\Form\Task\Step;

use App\Dto\TaskDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
                'required' => false,
                'attr' => ['placeholder' => 'Assigned To'],
                'row_attr' => ['class' => 'input-group mb-3'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
