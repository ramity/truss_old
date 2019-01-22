<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\TaskPriority;
use App\Entity\TaskStatus;

// Docs on using a single fixture to generate data https://goo.gl/RGX7P9
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $taskPriority = new TaskPriority();
        $taskPriority->setName("ASAP");
        $taskPriority->setColor("#c0392b");
        $manager->persist($taskPriority);

        $taskPriority = new TaskPriority();
        $taskPriority->setName("High");
        $taskPriority->setColor("#e74c3c");
        $manager->persist($taskPriority);

        $taskPriority = new TaskPriority();
        $taskPriority->setName("Normal");
        $taskPriority->setColor("#e67e22");
        $manager->persist($taskPriority);

        $taskPriority = new TaskPriority();
        $taskPriority->setName("Low");
        $taskPriority->setColor("#f1c40f");
        $manager->persist($taskPriority);

        $taskPriority = new TaskPriority();
        $taskPriority->setName("Wishlist");
        $taskPriority->setColor("#2ecc71");
        $manager->persist($taskPriority);

        $taskPriority = new TaskPriority();
        $taskPriority->setName("TBD");
        $taskPriority->setColor("#3498db");
        $manager->persist($taskPriority);

        $taskStatus = new TaskStatus();
        // ...tbc

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
