<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class TaskDto
{
    public string $currentStep = 'basic'; // IMPORTANT
    #[Assert\NotBlank(message: 'Task name cannot be empty.', groups: ['basic'])]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Task name must be at least {{ limit }} characters long.',
        maxMessage: 'Task name cannot exceed {{ limit }} characters.',
        groups: ['basic']
    )]
    public string $task;
    #[Assert\Length(
        max: 1000,
        maxMessage: 'Description cannot exceed {{ limit }} characters.',
        groups: ['basic']
    )]
    public ?string $description = null;
    #[Assert\NotBlank(message: 'Priority is required.', groups: ['details'])]
    #[Assert\Choice(
        choices: ['low', 'medium', 'high'],
        message: 'Priority must be one of: low, medium, high.',
        groups: ['details']
    )]
    public string $priority;
    #[Assert\NotBlank(message: 'Status is required.', groups: ['details'])]
    #[Assert\Choice(
        choices: ['pending', 'in_progress', 'completed'],
        message: 'Status must be one of: pending, in_progress, completed.',
        groups: ['details']
    )]
    public string $status;
    #[Assert\Length(
        max: 255,
        maxMessage: 'Assigned To cannot exceed {{ limit }} characters.',
        groups: ['details']
    )]
    public ?string $assignedTo = null;
    #[Assert\Type(type: 'array', message: 'Tags must be an array.', groups: ['details'])]
    public array $tags = [];
    #[Assert\NotBlank(message: 'Due date is required.', groups: ['confirmation'])]
    #[Assert\Type(type: \DateTimeInterface::class, message: 'Due date must be a valid date.', groups: ['confirmation'])]
    public ?\DateTimeInterface $dueDate = null;
    #[Assert\Type(type: 'bool', message: 'Completion status must be true or false.', groups: ['confirmation'])]
    public bool $isCompleted;
    #[Assert\IsTrue(message: 'You must agree to the terms.', groups: ['confirmation'])]
    public bool $agreeTerms;
}
