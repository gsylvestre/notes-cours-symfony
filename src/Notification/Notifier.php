<?php

namespace App\Notification;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;

class Notifier
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {

        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function sendNewLessonCardNotificationToAdmin()
    {
        //$this->mailer->send();
    }

}