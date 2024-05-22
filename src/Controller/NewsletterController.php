<?php

namespace App\Controller;

use App\Entity\NewsletterContact;
use App\Service\ApiOhmeService;
use App\Service\EmailSenderService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter-form', name: 'newsletter_newsletterForm', methods: "POST")]
    public function newsletterForm(ApiOhmeService $ohmeService, Request $request, ManagerRegistry $doctrine, EmailSenderService $emailSenderService) : Response {

        try {
            $contactRequest = $request->toArray();
            try {
                $firstname = ucfirst(mb_strtolower($contactRequest['firstname']));
                $lastname = mb_strtoupper($contactRequest['lastname']);
                $email = mb_strtolower($contactRequest['email']);
            }

            catch (\Exception $exception) {
                $status = 400;
                $message = "Bad request ! Request body is not valid !";
                $json = array("status" => $status, "message" => $message);
                return new Response(json_encode($json), 400, array("Content-Type" => "application/json"));
            }
        }

        catch (\Exception $exception) {
            $status = 400;
            $message = "Bad request ! Request body is empty !";
            $json = array("status" => $status, "message" => $message);
            return new Response(json_encode($json), 400, array("Content-Type" => "application/json"));
        }

        $emailSenderService->sendNewsletterWelcomeEmail("yahad-newsletter@yiu.ngo", $firstname, $lastname, $email);

        try {
            $ohmeResponse = $ohmeService->createOhmeContact($firstname, $lastname, $email);
            $ohmeStatus = $ohmeResponse->getStatusCode();
        }

        catch (\Exception $exception) {
            $ohmeStatus = 400;
        }

        $contact = new NewsletterContact();
        $contact->setFirstname($firstname);
        $contact->setLastname($lastname);
        $contact->setEmail($email);
        $contact->setOhmeStatus($ohmeStatus);
        $contact->setCreationDate(new \DateTime('now'));

        $manager = $doctrine->getManager();
        $manager->persist($contact);
        $manager->flush();

        $status = 200;
        $message = "New contact created !";
        $json = array("message" => $message, "status" => $status, "OHME Status" => $ohmeStatus);
        return new Response(json_encode($json), 200, array("Content-Type" => "application/json"));
    }
}
