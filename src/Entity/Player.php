<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre prénom')]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre nom')]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre mail')]
    private ?string $mail = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre âge')]
    private ?string $age = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre adresse')]
    private ?string $adress = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre pays')]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondFirstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondLastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondMail = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $secondAge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondAdress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondCountry = null;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'player')]
    private ?Competition $competition = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSecondFirstName(): ?string
    {
        return $this->secondFirstName;
    }

    public function setSecondFirstName(string $secondFirstName): self
    {
        $this->secondFirstName = $secondFirstName;

        return $this;
    }

    public function getSecondLastName(): ?string
    {
        return $this->secondLastName;
    }

    public function setSecondLastName(?string $secondLastName): self
    {
        $this->secondLastName = $secondLastName;

        return $this;
    }

    public function getSecondMail(): ?string
    {
        return $this->secondMail;
    }

    public function setSecondMail(?string $secondMail): self
    {
        $this->secondMail = $secondMail;

        return $this;
    }

    public function getSecondAge(): ?string
    {
        return $this->secondAge;
    }

    public function setSecondAge(?string $secondAge): self
    {
        $this->secondAge = $secondAge;

        return $this;
    }

    public function getSecondAdress(): ?string
    {
        return $this->secondAdress;
    }

    public function setSecondAdress(?string $secondAdress): self
    {
        $this->secondAdress = $secondAdress;

        return $this;
    }

    public function getSecondCountry(): ?string
    {
        return $this->secondCountry;
    }

    public function setSecondCountry(string $secondCountry): self
    {
        $this->secondCountry = $secondCountry;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }
}
