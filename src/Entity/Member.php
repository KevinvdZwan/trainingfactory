<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\registration", inversedBy="id_member")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_member;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lesson", inversedBy="lesson_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lesson_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMember(): ?registration
    {
        return $this->id_member;
    }

    public function setIdMember(?registration $id_member): self
    {
        $this->id_member = $id_member;

        return $this;
    }

    public function getLessonId(): ?Lesson
    {
        return $this->lesson_id;
    }

    public function setLessonId(?Lesson $lesson_id): self
    {
        $this->lesson_id = $lesson_id;

        return $this;
    }
}
