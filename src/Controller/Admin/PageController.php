<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pages")
 */
class PageController
{
    /**
     * @Route("")
     */
    public function listPages(): Response
    {
        return new Response('List of all pages!!!');
    }

    /**
     * @Route("/{id}")
     */
    public function detailPage(string $id): Response
    {
        return new Response('Details for page '.$id);
    }
}