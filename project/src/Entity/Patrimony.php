<?php

namespace App\Entity;

use App\Repository\PatrimonyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatrimonyRepository::class)
 */
class Patrimony
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
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bailleur;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="patrimony")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="patrimonies")
     */
    private $services;


    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->services = new ArrayCollection();

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescripption(): ?string
    {
        return $this->descripption;
    }

    public function setDescripption(?string $descripption): self
    {
        $this->descripption = $descripption;

        return $this;
    }

    public function getBailleur(): ?string
    {
        return $this->bailleur;
    }

    public function setBailleur(string $bailleur): self
    {
        $this->bailleur = $bailleur;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPatrimony($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPatrimony() === $this) {
                $user->setPatrimony(null);
            }
        }

        return $this;
    }

 

    public function __toString(): string
    {
        return $this->label;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }


}
