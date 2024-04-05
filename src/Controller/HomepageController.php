<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'APP_HOMEPAGE')]
    public function index(HubInterface $hub): Response
    {
        $update = new Update(
            'https://project-a3.local/books/1',
            json_encode(['status' => 'OutOfStock'])
        );

        $hub->publish($update);

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
