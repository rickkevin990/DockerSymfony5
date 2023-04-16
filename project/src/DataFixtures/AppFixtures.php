<?php

namespace App\DataFixtures;

use App\Entity\Patrimony;
use App\Entity\Service;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $service = new Service();
        $service->setLabel("service2");
        $service->setSublabel("service2");
        $service->setDescription("service2 desc");
        $service->setDateDebutPublication(new \DateTime("now"));
        $service->setDateFinPublications(new \DateTime("now"));
        $manager->persist($service);

        $patrimony = new Patrimony();
        $patrimony->setLabel("patrimony2");
        $patrimony->setBailleur("patrimony2 bailleur");
        $patrimony->setDescripption("patrimony2 desc");
        $patrimony->setLabel("patrimony2 Type");
        $patrimony->addService($service);
        $patrimony->setType("typePatry");
        $manager->persist($patrimony);


        $pass = "$";
        $user = new User();
        $user->setEmail("kekes@mail.com");
        $user->setFirstname("kekes@mail.com");
        $user->setLastname("kekes@mail.com");
        $user->setPassword("$2y$13".$pass."qA20wibk2yh/YRrG6pRzJOFO6zTeUnhhwO8p4N3nF0vmEQqTt8hna");
        $user->setPatrimony($patrimony);
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPhone("12121211");
        $manager->persist($user);

        $manager->flush();
    }
}
