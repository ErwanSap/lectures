<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function register(Request $request,
                             EntityManagerInterface $em,
                                UserPasswordEncoderInterface $encoder)
    {
        //declare une instance user
        $user = new User();
        //creation de la date de création, pas obligatoire
        $user->setDateCreated(new \DateTime());
        //pour dire que les personnes qui s'incrive ne sont pas administeur
        $user->setIsAdmin(false);

        //$user->getRoles($this->login());
        //crée un registerform qui appel le creatform pour le formulaire et
        //qui crée le formulaire dans la variable $user
        //on passe en deuxieme argument le user
        $registerForm = $this->createForm(RegisterType::class, $user);

        //recupere les donnees de requete
        $registerForm->handleRequest($request);
        //si le registre est soumi et qu'il est valide alors le mot de passe
        //sera hacher
        if ($registerForm->isSubmitted() && $registerForm->isValid()){
            //hacher le mot de passe
            //cree le fichier security pour que le mot de passse soit haché
            $hached = $encoder->encodePassword($user, $user->getPassword());
            //ecraser le mot de passe, le crypte
            $user->setPassword($hached);
            //sauvegarder l'utilisateur
            $em ->persist($user);
            $em->flush();

            //redirige vers la page login
            return $this->redirectToRoute('login');
        }


        //retourne, crée la vu et passer  la vu avec le registerform
        return $this->render('user/register.html.twig', [
            'registerForm' => $registerForm->createView(),
        ]);
    }
    /**
     * @Route("/login", name="login")
     *///affiche le formulaire de connexion
    public function login(){
        //pas besoin de traiter le formulaire de login car symfony le
        //fait à ma place
        return $this->render("user/login.html.twig",[

        ]);
    }

    //declaration de la deconnexion avec la route et une fonction vide
    //ne pas oublier la declaration dans le fichier security
    //symfony gere entierement cette route
    //ne pas oublier de faire la declaration dans le fichier security
    /**
     * @Route("/logout",name="logout")
     *
     */
    public function logout(){

    }

}
