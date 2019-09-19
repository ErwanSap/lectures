<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends Controller
{
    /**
     * @Route("/book", name="book")
     */
    public function book()
    {
        //Sio la personne n'a pas ce roles là alors il y aura une erreur 403
        //$this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('book/livre.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
}
