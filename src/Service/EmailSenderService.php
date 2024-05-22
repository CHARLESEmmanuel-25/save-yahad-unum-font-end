<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class EmailSenderService
{
    private $mailer;

    /**
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendNewsletterWelcomeEmail(string $yahadAddress, string $firstname, string $name, string $email) : void {
        $welcomeEmail = (new TemplatedEmail())
            ->from($yahadAddress)
            ->to(new Address($email))
            ->subject("Welcome to our Newsletter ! / Bienvenue à notre Newsletter !")
            ->htmlTemplate('newsletter/new-subscriber.html.twig')

            ->context([
                'firstname' => $firstname,
                'name' => $name,
            ]);

        $this->mailer->send($welcomeEmail);

    }

}