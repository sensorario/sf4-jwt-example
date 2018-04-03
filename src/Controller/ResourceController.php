<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResourceController extends Controller
{
    /** @Route("/resource/{resource}", name="resource") */
    public function index(
        \App\Response\Response $response,
        \App\Dictionary\Dictionary $dictionary,
        string $resource
    ) {
        if ($dictionary->notContains($resource)) {
            return $response->notFound();
        }

        return $response->hateoas($resource);
    }
}
