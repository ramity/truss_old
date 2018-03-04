<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RepoRepository")
 */
class Repo
{
    public function __construct()
    {
        $this->isActive = true;
        $this->dateCreated = microtime(true);
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $path;

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setStatus($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $dateCreated;

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }
}
