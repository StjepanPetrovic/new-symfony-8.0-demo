<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\TaskDto;
use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskController extends AbstractController
{
    #[Route('/task')]
    public function new(Request $request): Response
    {
        $task = new TaskDto();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            dd($task);
        }

        return $this->render('task/new.html.twig', [
            'form' => $form
        ]);
    }
}
