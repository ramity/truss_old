<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $testPlan;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private $reviewers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private $subscribers;

    public function __construct()
    {
        $this->reviewers = new ArrayCollection();
        $this->subscribers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getTestPlan(): ?string
    {
        return $this->testPlan;
    }

    public function setTestPlan(?string $testPlan): self
    {
        $this->testPlan = $testPlan;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getReviewers(): Collection
    {
        return $this->reviewers;
    }

    public function addReviewer(User $reviewer): self
    {
        if (!$this->reviewers->contains($reviewer)) {
            $this->reviewers[] = $reviewer;
        }

        return $this;
    }

    public function removeReviewer(User $reviewer): self
    {
        if ($this->reviewers->contains($reviewer)) {
            $this->reviewers->removeElement($reviewer);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getSubscribers(): Collection
    {
        return $this->subscribers;
    }

    public function addSubscriber(User $subscriber): self
    {
        if (!$this->subscribers->contains($subscriber)) {
            $this->subscribers[] = $subscriber;
        }

        return $this;
    }

    public function removeSubscriber(User $subscriber): self
    {
        if ($this->subscribers->contains($subscriber)) {
            $this->subscribers->removeElement($subscriber);
        }

        return $this;
    }
}
