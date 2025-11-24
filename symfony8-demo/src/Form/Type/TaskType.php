<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Dto\TaskDto;
use App\Form\Task\Step\TaskBasicInformationsType;
use App\Form\Task\Step\TaskConfirmationType;
use App\Form\Task\Step\TaskDetailsType;
use App\Form\Task\TaskNavigatorType;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder->addStep('basic', TaskBasicInformationsType::class);
        $builder->addStep('details', TaskDetailsType::class);
        $builder->addStep('confirmation', TaskConfirmationType::class);

        $builder->add('navigator', TaskNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TaskDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}
