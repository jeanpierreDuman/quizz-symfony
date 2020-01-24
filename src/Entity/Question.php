<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Quizz", inversedBy="questions")
     */
    private $quizz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reply1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reply2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reply3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reply4;

    /**
     * @ORM\Column(type="boolean")
     */
    private $truth1;

    /**
     * @ORM\Column(type="boolean")
     */
    private $truth2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $truth3;

    /**
     * @ORM\Column(type="boolean")
     */
    private $truth4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuizz(): ?Quizz
    {
        return $this->quizz;
    }

    public function setQuizz(?Quizz $quizz): self
    {
        $this->quizz = $quizz;

        return $this;
    }

    public function getReply1(): ?string
    {
        return $this->reply1;
    }

    public function setReply1(string $reply1): self
    {
        $this->reply1 = $reply1;

        return $this;
    }

    public function getReply2(): ?string
    {
        return $this->reply2;
    }

    public function setReply2(string $reply2): self
    {
        $this->reply2 = $reply2;

        return $this;
    }

    public function getReply3(): ?string
    {
        return $this->reply3;
    }

    public function setReply3(string $reply3): self
    {
        $this->reply3 = $reply3;

        return $this;
    }

    public function getReply4(): ?string
    {
        return $this->reply4;
    }

    public function setReply4(string $reply4): self
    {
        $this->reply4 = $reply4;

        return $this;
    }

    public function getTruth1(): ?bool
    {
        return $this->truth1;
    }

    public function setTruth1(bool $truth1): self
    {
        $this->truth1 = $truth1;

        return $this;
    }

    public function getTruth2(): ?bool
    {
        return $this->truth2;
    }

    public function setTruth2(bool $truth2): self
    {
        $this->truth2 = $truth2;

        return $this;
    }

    public function getTruth3(): ?bool
    {
        return $this->truth3;
    }

    public function setTruth3(bool $truth3): self
    {
        $this->truth3 = $truth3;

        return $this;
    }

    public function getTruth4(): ?bool
    {
        return $this->truth4;
    }

    public function setTruth4(bool $truth4): self
    {
        $this->truth4 = $truth4;

        return $this;
    }
}
