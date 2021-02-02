<?php

namespace App\Controller;

use App\Entity\LessonCard;
use App\Form\LessonCardType;
use App\Notification\Notifier;
use App\Repository\LessonCardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function create(
        Request $request,
        EntityManagerInterface $entityManager,
        Notifier $notifier
    ): Response
    {
        //crée une instance de notre entité, qui sera éventuellement sauvegardée en bdd
        $lessonCard = new LessonCard();

        //crée une instance du form, en lui associant notre entité
        $form = $this->createForm(LessonCardType::class, $lessonCard);

        //prend les données du formulaire soumis et les hydrate dans mon entité
        $form->handleRequest($request);

        //est-ce que le formulaire est soumis et valide...
        if($form->isSubmitted() && $form->isValid()){
            //hydrate les propriétés manquantes
            $lessonCard->setDateCreated(new \DateTime());

            //déclenche l'insert dans la bdd
            $entityManager->persist($lessonCard);
            $entityManager->flush();

            //crée un message en session pour l'afficher sur la prochaine page
            $this->addFlash('success', 'Votre fiche a bien été créée !');

            //envoie un mail à l'admin
            $notifier->sendNewLessonCardNotificationToAdmin();

            //redirige vers une autre page
            return $this->redirectToRoute('lesson_card_detail', ['id' => $lessonCard->getId()]);
        }

        //affiche la page twig
        return $this->render('lesson_card/create.html.twig', [
            "card_form" => $form->createView()
        ]);
    }
}
