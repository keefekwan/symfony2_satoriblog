<?php
// src/KK/SatoriBundle/DataFixtures/ORM/LoadCategories.php

namespace KK\SatoriBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use KK\SatoriBundle\Entity\Category;

class LoadCategories extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setTitle('Category1');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setTitle('Category2');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setTitle('Category3');
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setTitle('Category4');
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setTitle('Category5');
        $manager->persist($category5);

        $category6 = new Category();
        $category6->setTitle('Category6');
        $manager->persist($category6);

        $manager->flush();

        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);
        $this->addReference('category-3', $category3);
        $this->addReference('category-4', $category4);
        $this->addReference('category-5', $category5);
        $this->addReference('category-6', $category6);
    }

    public function getOrder()
    {
        return 10;
    }
}