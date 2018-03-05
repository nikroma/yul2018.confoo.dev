<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{id}", name="homepage_with_id", requirements={"id": "\d+"})
     */
    public function index(Request $request, int $id = null): Response
    {
        return $this->render('homepage/index.html.twig', [
            'name' => $request->query->get('name', 'World'),
            'id' => $id,
        ]);
    }
}
