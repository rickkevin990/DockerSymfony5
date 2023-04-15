<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Patrimony::class, mappedBy="users")
     */
    private $patrimonies;

    /**
     * @ORM\ManyToOne(targetEntity=Patrimony::class, inversedBy="users")
     */
    private $patrimony;

    public function __construct()
    {
        $this->patrimonies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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

    /**
     * @return Collection<int, Patrimony>
     */
    public function getPatrimonies(): Collection
    {
        return $this->patrimonies;
    }

    public function addPatrimony(Patrimony $patrimony): self
    {
        if (!$this->patrimonies->contains($patrimony)) {
            $this->patrimonies[] = $patrimony;
            $patrimony->setUsers($this);
        }

        return $this;
    }

    public function removePatrimony(Patrimony $patrimony): self
    {
        if ($this->patrimonies->removeElement($patrimony)) {
            // set the owning side to null (unless already changed)
            if ($patrimony->getUsers() === $this) {
                $patrimony->setUsers(null);
            }
        }

        return $this;
    }

    public function getPatrimony(): ?Patrimony
    {
        return $this->patrimony;
    }

    public function setPatrimony(?Patrimony $patrimony): self
    {
        $this->patrimony = $patrimony;

        return $this;
    }

    public function __toString(): string
    {
        return $this->firstname;
    }
}
