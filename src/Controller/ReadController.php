<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ReadController extends Controller
{
    /**
     * @Route("/read", name="read")
     */
    public function read()
    {

        return $this->render('read/lecture.html.twig', [
            'controller_name' => 'ReadController',
        ]);
    }
}
