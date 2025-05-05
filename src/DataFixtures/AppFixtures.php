<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Exemple : Ajouter un utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail('admin@example.com');
        $utilisateur->setRoles(['ROLE_ADMIN']);
        $utilisateur->setPassword($this->passwordHasher->hashPassword($utilisateur, 'password123'));
        $utilisateur->setNom('Admin');
        $utilisateur->setPrenom('Super');
        $utilisateur->setTelephone('0123456789');
        $utilisateur->setReference('REF123');

        $manager->persist($utilisateur);

        // Ajoutez d'autres entités ici...

        $manager->flush();
    }
}
