<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
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
    private $loginname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $preprovision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $dateofbirth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailaddress;

    /**
     * @ORM\Column(type="boolean")
     */
    private $admin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $hiringdate;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registration", mappedBy="id_person")
     */
    private $id_registration;

    public function __construct()
    {
        $this->id_registration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginname(): ?string
    {
        return $this->loginname;
    }

    public function setLoginname(string $loginname): self
    {
        $this->loginname = $loginname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPreprovision(): ?bool
    {
        return $this->preprovision;
    }

    public function setPreprovision(bool $preprovision): self
    {
        $this->preprovision = $preprovision;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmailaddress(): ?string
    {
        return $this->emailaddress;
    }

    public function setEmailaddress(string $emailaddress): self
    {
        $this->emailaddress = $emailaddress;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getHiringdate(): ?\DateTimeInterface
    {
        return $this->hiringdate;
    }

    public function setHiringdate(?\DateTimeInterface $hiringdate): self
    {
        $this->hiringdate = $hiringdate;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getIdRegistration(): Collection
    {
        return $this->id_registration;
    }

    public function addIdRegistration(Registration $idRegistration): self
    {
        if (!$this->id_registration->contains($idRegistration)) {
            $this->id_registration[] = $idRegistration;
            $idRegistration->setIdPerson($this);
        }

        return $this;
    }

    public function removeIdRegistration(Registration $idRegistration): self
    {
        if ($this->id_registration->contains($idRegistration)) {
            $this->id_registration->removeElement($idRegistration);
            // set the owning side to null (unless already changed)
            if ($idRegistration->getIdPerson() === $this) {
                $idRegistration->setIdPerson(null);
            }
        }

        return $this;
    }
}
