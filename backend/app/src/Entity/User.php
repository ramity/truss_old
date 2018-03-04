<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use App\Entity\PublicKey;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    public function __construct()
    {
        $this->salt = strrev(base_convert(bin2hex(hash('sha512', uniqid(mt_rand() . microtime(true) * 10000, true), true)), 16, 36));
        $this->token = strrev(base_convert(bin2hex(hash('sha512', uniqid(mt_rand() . microtime(true) * 10000, true), true)), 16, 36));
        $this->dateCreated = microtime(true);
        $this->publicKeys = new ArrayCollection();
        $this->loginAttempts = new ArrayCollection();
        $this->userSettings = new ArrayCollection();
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
    private $username;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $hash;

    public function getHash()
    {
        return $this->hash;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $salt;

    public function getSalt()
    {
        //play overwatch
        return $this->salt;
    }

    public function setSalt($salt)
    {
        //carry as bastion
        $this->salt = $salt;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $firstName;

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $lastName;

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $token;

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;

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

    /**
     * Many Users have Many PublicKeys.
     * @ORM\ManyToMany(targetEntity="PublicKey")
     * @ORM\JoinTable(name="User_PublicKey",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="publicKey_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $publicKeys;

    public function getPublicKeys()
    {
        return $this->publicKeys;
    }

    public function setPublicKeys($publicKeys)
    {
        $this->publicKeys = $publicKeys;

        return $this;
    }

    public function addPublicKey($publicKey)
    {
        if(!$this->publicKeys->contains($publicKey))
        {
            $publicKeys->add($publicKey);
        }

        return $this;
    }

    /**
     * Many User have Many LoginAttempts.
     * @ORM\ManyToMany(targetEntity="LoginAttempt")
     * @ORM\JoinTable(name="User_LoginAttempt",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="loginAttempt_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $loginAttempts;

    public function getLoginAttempts()
    {
        return $this->loginAttempts;
    }

    public function setLoginAttempts($loginAttempts)
    {
        $this->loginAttempts = $loginAttempts;

        return $this;
    }

    public function addLoginAttempt($loginAttempt)
    {
        if(!$this->loginAttempts->contains($loginAttempt))
        {
            $this->loginAttempts->add($loginAttempt);
        }

        return $this;
    }

    /**
     * Many User have Many LoginAttempts.
     * @ORM\ManyToMany(targetEntity="UserSetting")
     * @ORM\JoinTable(name="User_UserSetting",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userSetting_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $userSettings;

    public function getUserSettings()
    {
        return $this->userSettings;
    }

    public function setUserSettings($userSettings)
    {
        $this->userSettings = $userSettings;

        return $this;
    }

    public function addUserSetting($userSetting)
    {
        if(!$this->userSettings->contains($userSetting))
        {
            $this->userSettings->add($userSetting);
        }

        return $this;
    }
}
