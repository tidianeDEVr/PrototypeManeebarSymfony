<?php

namespace App\Entity;

use App\Repository\TechnicienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnicienRepository::class)]
class Technicien extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'json', nullable: true)]
    private $grade = [];

    #[ORM\ManyToOne(targetEntity: Service::class, inversedBy: 'techniciens')]
    private $service;

    #[ORM\OneToMany(mappedBy: 'technicien', targetEntity: RendezVous::class)]
    private $rendezvous;

    public function __construct()
    {
        $this->rendezvous = new ArrayCollection();
        $this->setRole = ['ROLE_TECHNICIEN'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getGrade(): ?array
    {
        return $this->grade;
    }

    public function setGrade(?array $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezvous(): Collection
    {
        return $this->rendezvous;
    }

    public function addRendezvou(RendezVous $rendezvou): self
    {
        if (!$this->rendezvous->contains($rendezvou)) {
            $this->rendezvous[] = $rendezvou;
            $rendezvou->setTechnicien($this);
        }

        return $this;
    }

    public function removeRendezvou(RendezVous $rendezvou): self
    {
        if ($this->rendezvous->removeElement($rendezvou)) {
            // set the owning side to null (unless already changed)
            if ($rendezvou->getTechnicien() === $this) {
                $rendezvou->setTechnicien(null);
            }
        }

        return $this;
    }
}
