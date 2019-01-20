<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastActiveAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEmailVerified;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SecuredShellKey", mappedBy="user", orphanRemoval=true)
     */
    private $securedShellKeys;

    public function __construct()
    {
        $this->securedShellKeys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLastActiveAt(): ?\DateTimeInterface
    {
        return $this->lastActiveAt;
    }

    public function setLastActiveAt(\DateTimeInterface $lastActiveAt): self
    {
        $this->lastActiveAt = $lastActiveAt;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsEmailVerified(): ?bool
    {
        return $this->isEmailVerified;
    }

    public function setIsEmailVerified(bool $isEmailVerified): self
    {
        $this->isEmailVerified = $isEmailVerified;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return Collection|SecuredShellKey[]
     */
    public function getSecuredShellKeys(): Collection
    {
        return $this->securedShellKeys;
    }

    public function addSecuredShellKey(SecuredShellKey $securedShellKey): self
    {
        if (!$this->securedShellKeys->contains($securedShellKey)) {
            $this->securedShellKeys[] = $securedShellKey;
            $securedShellKey->setUser($this);
        }

        return $this;
    }

    public function removeSecuredShellKey(SecuredShellKey $securedShellKey): self
    {
        if ($this->securedShellKeys->contains($securedShellKey)) {
            $this->securedShellKeys->removeElement($securedShellKey);
            // set the owning side to null (unless already changed)
            if ($securedShellKey->getUser() === $this) {
                $securedShellKey->setUser(null);
            }
        }

        return $this;
    }
}
