<?php

declare(strict_types=1);

namespace App\Form\Task;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Flow\FormFlowCursor;
use Symfony\Component\Form\Flow\Type\FinishFlowType;
use Symfony\Component\Form\Flow\Type\NextFlowType;
use Symfony\Component\Form\Flow\Type\PreviousFlowType;
use Symfony\Component\Form\Flow\Type\ResetFlowType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('reset', ResetFlowType::class); // BUG on demo?
        $builder->add('back', PreviousFlowType::class, [
            'validate' => false,
            'validation_groups' => false,
            'clear_submission' => false,
            'include_if' => fn (FormFlowCursor $cursor) => !$cursor->isFirstStep(),
        ]);
        $builder->add('next', NextFlowType::class, ['label' => 'Continue']);
        $builder->add('finish', FinishFlowType::class, ['label' => 'Sign Up']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'mapped' => false,
            'priority' => -100,
        ]);
    }
}
