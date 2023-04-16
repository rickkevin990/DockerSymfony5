<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;



/**
 *
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @Groups({"service"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"service"})
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @Groups({"service"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sublabel;

    /**
     * @Groups({"service"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @Groups({"service"})
     * @ORM\Column(type="date")
     */
    private $date_debut_publication;



    /**
     *
     * @Groups({"service"})
     * @ORM\ManyToMany(targetEntity=Patrimony::class, mappedBy="services")
     */
    private $patrimonies;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_fin_publications;



    public function __construct()
    {
        $this->patrimony = new ArrayCollection();
        $this->patrimonies = new ArrayCollection();
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

    public function getSublabel(): ?string
    {
        return $this->sublabel;
    }

    public function setSublabel(?string $sublabel): self
    {
        $this->sublabel = $sublabel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebutPublication(): ?\DateTimeInterface
    {
        return $this->date_debut_publication;
    }

    public function setDateDebutPublication(\DateTimeInterface $date_debut_publication): self
    {
        $this->date_debut_publication = $date_debut_publication;

        return $this;
    }




    public function __toString(): string
    {
        return $this->label;
    }

    /**
     * @return Collection<int, Patrimony>
     */
    public function getPatrimony(): Collection
    {
        return $this->patrimony;
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
            $patrimony->addService($this);
        }

        return $this;
    }

    public function removePatrimony(Patrimony $patrimony): self
    {
        if ($this->patrimonies->removeElement($patrimony)) {
            $patrimony->removeService($this);
        }

        return $this;
    }

    public function getDateFinPublications(): ?\DateTimeInterface
    {
        return $this->date_fin_publications;
    }

    public function setDateFinPublications(?\DateTimeInterface $date_fin_publications): self
    {
        $this->date_fin_publications = $date_fin_publications;

        return $this;
    }


}
