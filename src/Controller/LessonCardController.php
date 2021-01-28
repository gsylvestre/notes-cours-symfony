<?php

namespace App\Controller;

use App\Form\LessonCardType;
use App\Repository\LessonCardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonCardController extends AbstractController
{
    /**
     * @Route("/fiches/details/{id}", name="lesson_card_detail")
     */
    public function details(int $id, LessonCardRepository $lessonCardRepository): Response
    {
        $lessonCard = $lessonCardRepository->find($id);

        return $this->render('lesson_card/details.html.twig', [
            'lesson_card' => $lessonCard
        ]);
    }

    /**
     * @Route("/fiches/nouvelle", name="lesson_card_create")
     */
    public function create(): Response
    {
        $form = $this->createForm(LessonCardType::class);
        return $this->render('lesson_card/create.html.twig', [
            "card_form" => $form->createView()
        ]);
    }
}
