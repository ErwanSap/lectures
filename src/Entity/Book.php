<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=750)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDePage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeModif;

    private $roles;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getNombreDePage()
    {
        return $this->nombreDePage;
    }

    public function setNombreDePage(int $nombreDePage)
    {
        $this->nombreDePage = $nombreDePage;

        return $this;
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

    public function getDateDeModif()
    {
        return $this->dateDeModif;
    }

    public function setDateDeModif(\DateTimeInterface $dateDeModif)
    {
        $this->dateDeModif = $dateDeModif;

        return $this;
    }


}
