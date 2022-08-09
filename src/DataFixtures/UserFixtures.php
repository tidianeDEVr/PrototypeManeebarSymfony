<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Moderateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $plainPassword = 'passer@123'; 
        
        $moderateur = new Moderateur();
        $passwordEncode= $this->encoder->hashPassword($moderateur,$plainPassword);
        $moderateur->setLogin('moderateur@gmail.com')
        ->setPrenom('Moderateur')
        ->setNom('Moderateur')
        ->setPassword($passwordEncode);
        $moderateur->setRoles = ['ROLE_MODERATOR'];

        $client = new Client();
        $passwordEncode= $this->encoder->hashPassword($client,$plainPassword);
        $client->setLogin('client@gmail.com')
        ->setPrenom('Client')
        ->setNom('Client');
        $client->setRoles = ['ROLE_CLIENT'];
        $client->setAdresse('Dakar Hann Maristes');
        $client->setPhone(781234567)
        ->setPassword($passwordEncode);

        $manager->persist($moderateur);
        $manager->persist($client);

        $manager->flush();
    }
}
