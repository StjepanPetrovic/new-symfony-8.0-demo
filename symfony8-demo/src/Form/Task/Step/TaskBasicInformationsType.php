<?php

declare(strict_types=1);

namespace App\Form\Task\Step;

use App\Dto\TaskDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskBasicInformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('task', TextType::class, [
                'attr' => ['placeholder' => 'Task Name'],
                'row_attr' => ['class' => 'input-group mb-3'],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['placeholder' => 'Task Description'],
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
