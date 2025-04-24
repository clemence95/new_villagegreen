<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable:false)] //Obligatoire
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable:false)] //Obligatoire
    private ?string $contact = null;

    #[ORM\Column(length: 100, nullable:false)] //Obligatoire
    #[Assert\Email] //Validation de l'email
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable:false)] // Obligatoire
    #[Assert\Regex(
        pattern: '/^\+?[0-9]{10,15}$/',
        message: 'Le numéro de téléphone doit contenir entre 10 et 15 chiffres.'
    )]
    #[Assert\NotBlank] //Validation pour s'assurer que le champ n'est pas vide
    private ?string $telephone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }
}
