<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        //Si la personne n'a pas ce roles là alors il y aura une erreur 403
        //$this->denyAccessUnlessGranted('ROLE_USER');

        $admin = new User();

        $adminForm = $this->createForm(RegisterType::class, $admin);

        return $this->render('admin/admin.html.twig', [
            'adminForm' => 'AdminController',
        ]);
    }
}
