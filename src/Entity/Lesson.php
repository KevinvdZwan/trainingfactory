<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $max_persons;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\member", mappedBy="lesson_id")
     */
    private $lesson_id;

    public function __construct()
    {
        $this->lesson_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getMaxPersons(): ?string
    {
        return $this->max_persons;
    }

    public function setMaxPersons(string $max_persons): self
    {
        $this->max_persons = $max_persons;

        return $this;
    }

    /**
     * @return Collection|member[]
     */
    public function getLessonId(): Collection
    {
        return $this->lesson_id;
    }

    public function addLessonId(member $lessonId): self
    {
        if (!$this->lesson_id->contains($lessonId)) {
            $this->lesson_id[] = $lessonId;
            $lessonId->setLessonId($this);
        }

        return $this;
    }

    public function removeLessonId(member $lessonId): self
    {
        if ($this->lesson_id->contains($lessonId)) {
            $this->lesson_id->removeElement($lessonId);
            // set the owning side to null (unless already changed)
            if ($lessonId->getLessonId() === $this) {
                $lessonId->setLessonId(null);
            }
        }

        return $this;
    }
}
