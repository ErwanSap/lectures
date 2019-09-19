<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * Crée les entité de la base de donnée, mettre les ORM\colonnes.
 * Modifier le roles pour qu'il retourne un ROLE_USER dans un tableau.
 * Implementer UserInterface à la classe
 * En fin de programme, implementer les deux méthodes manquante  getSalt() qui retourne null
 * et eraseCredentials() qui est vide.
 *
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    // par defaut retourne true
    //
    //  l'orm\Column(type="boolean", nullable= false) pose un probleme voir avec
    //le formateur  /**
    //     * @ORM\Column(type="boolean", nullable= false)
    //     */

    private $roles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    //retourne rien
    public function getSalt(){return null;}

    public function eraseCredentials(){}


}
