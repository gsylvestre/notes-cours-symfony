<?php

namespace App\Controller;

use App\Entity\LessonCard;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home()
    {
        return $this->render('main/home.html.twig', []);
    }

    /**
     * @Route("/test", name="main_test")
     */
    public function test(EntityManagerInterface $entityManager)
    {
        //ou pour récupérer le gestionnaire d'entité
        //$entityManager = $this->getDoctrine()->getManager();

        $subjects = ['pif', 'paf', 'pouf'];
        foreach($subjects as $subject){
            $card = new LessonCard();
            $card->setName($subject);
            //...
            //$entityManager->persist($card);
        }
        //$entityManager->flush();

        //$entityManager->clear();

        //crée une instance de mon entité
        $card = new LessonCard();

        //hydrate chacune de ses propriétés requises
        $card->setName('Les commandes de console');
        $card->setContent('bla bla bla bal blab al');
        $card->setIsDraft(false);
        $card->setDateCreated(new \DateTime());

        //$entityManager = $this->getDoctrine()->getManager();

        //demande à Doctrine de sauvegarder notre instance
        $entityManager->persist($card);

        //crée une instance de mon entité
        $card2 = new LessonCard();

        //hydrate chacune de ses propriétés requises
        $card2->setName('Twig : fonctions utiles');
        $card2->setContent('bla bla bla bal blaadf asdlfkdsjfl dasjkfl djkfls jklfsafjk sjlfal');
        $card2->setIsDraft(true);
        $card2->setDateCreated(new \DateTime());

        //demande à Doctrine de sauvegarder notre instance
        $entityManager->persist($card2);

        //on exécute la requête sql maintenant
        $entityManager->flush();

        $username = "<h1>jean</h1>";
        return $this->render('main/test.html.twig', [
            "username" => $username,
            "product" => "pifpaf"
        ]);
    }
}