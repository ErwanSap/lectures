<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\User;
use App\Form\AdminType;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\Throw_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function admin( Request $request,EntityManagerInterface $em)
    {

        $book = new Book();

        $book->setDateCreated(new \DateTime());

        $bookForm = $this->createForm(AdminType::class, $book);

        $bookForm->handleRequest($request);

        if ($bookForm->isSubmitted() && $bookForm->isValid()){

            //sauvegarder l'utilisateur
            $em ->persist($book);
            $em->flush();

            //redirige vers la page login
            return $this->redirectToRoute('login');
        }

        //$this->denyAccessUnlessGranted('ROLE_ADMIN');

       // if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
          //  throw $this->createAccessDeniedException('GET OUT!');
            // if (!$this->isGranted('ROLE_ADMIN')){
            //    throw new AccessDeniedException();
            // }
            //Si la personne n'a pas ce roles là alors il y aura une erreur 403
            //$this->denyAccessUnlessGranted('ROLE_ADMIN', null,'vous n\'avez pas le role administrateur pour consulter cette page');

            //$admin = new User();

            // $adminForm = $this->createForm(RegisterType::class, $admin);

            return $this->render('admin/admin.html.twig', [
                //'adminForm' => Book::class,
                'bookForm' => $bookForm->createView()
             ]);
            //return new Response('ok');
            //return $this->render('admin/admin.html.twig', [

            //]);
        }

        /*
         * @Route("/admin/test", name="admin_home")
         *
         * public function test(){
         * return new Response('ok');
         * }/*
         *
         * /**
         * @param Request $request
         *
         * @param TokenInterface $token
         *
         * @return RedirectResponse
         *
         * public function onAuthenticationSuccess(Request $request, TokenInterface $token)
         * {
         * $roles = $token->getRoles();
         *
         * $rolesTab = array_map(function ($role) {
         * return $role->getRole();
         * }, $roles);
         *
         * if (in_array('ROLE_ADMIN', $rolesTab, true)) {
         * // c'est un aministrateur : on le rediriger vers l'espace admin
         * $redirection = new RedirectResponse($this->router->generate('ajouter'));
         * } else {
         * // c'est un utilisaeur lambda : on le rediriger vers l'accueil
         * $redirection = new RedirectResponse($this->router->generate('home'));
         * }
         *
         * return $redirection;
         * }*/
   // }

}
