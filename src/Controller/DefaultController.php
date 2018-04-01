<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @Route("/author", name="author")
     */
    public function author()
    {
        return $this->json([
            'username' => 'sensorario',
            'url' => 'http://sensorario.github.io',
        ]);
    }
}
