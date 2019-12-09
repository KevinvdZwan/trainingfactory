<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrationRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\person", inversedBy="id_registration")
     */
    private $id_person;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Member", mappedBy="id_member")
     */
    private $id_member;

    public function __construct()
    {
        $this->id_member = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayment(): ?bool
    {
        return $this->payment;
    }

    public function setPayment(bool $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getIdPerson(): ?person
    {
        return $this->id_person;
    }

    public function setIdPerson(?person $id_person): self
    {
        $this->id_person = $id_person;

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getIdMember(): Collection
    {
        return $this->id_member;
    }

    public function addIdMember(Member $idMember): self
    {
        if (!$this->id_member->contains($idMember)) {
            $this->id_member[] = $idMember;
            $idMember->setIdMember($this);
        }

        return $this;
    }

    public function removeIdMember(Member $idMember): self
    {
        if ($this->id_member->contains($idMember)) {
            $this->id_member->removeElement($idMember);
            // set the owning side to null (unless already changed)
            if ($idMember->getIdMember() === $this) {
                $idMember->setIdMember(null);
            }
        }

        return $this;
    }
}
