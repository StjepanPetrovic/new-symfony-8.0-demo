<?php

declare(strict_types=1);

namespace App\Form\Task\Step;

use App\Dto\TaskDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dueDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'To Be Completed Before',
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('isCompleted', CheckboxType::class, [
                'label' => 'Mark as Completed',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'I agree to the terms',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}
