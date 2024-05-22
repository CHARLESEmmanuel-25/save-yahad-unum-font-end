<?php

namespace App\Controller;

use App\Entity\Partner;
use App\Entity\TeamMember;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    #[Route('/', name: 'website_homepage')]
    public function homepage(ManagerRegistry $doctrine): Response
    {
        $members = $doctrine->getRepository(TeamMember::class)->findAll();
        $partners = $doctrine->getRepository(Partner::class)->findAll();

        return $this->render('website/homepage.html.twig', [
            'partners' => $partners,
            'members' => $members
        ]);
    }
}
