<?php

namespace App\Controller;

use App\Form\LessonCardType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonCardController extends AbstractController
{
    /**
     * @Route("/lesson-card/create", name="lesson_card_create")
     */
    public function create(): Response
    {
        $form = $this->createForm(LessonCardType::class);
        return $this->render('lesson_card/create.html.twig', [
            "card_form" => $form->createView()
        ]);
    }
}
