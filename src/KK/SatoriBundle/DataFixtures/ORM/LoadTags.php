<?php
// src/KK/SatoriBundle/DataFixtures/ORM/LoadTags.php

namespace KK\SatoriBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use KK\SatoriBundle\Entity\Tag;

class LoadTags extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tag1 = new Tag();
        $tag1->setTag('Tag 1');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setTag('Tag 2');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setTag('Tag 3');
        $manager->persist($tag3);

        $tag4 = new Tag();
        $tag4->setTag('Tag 4');
        $manager->persist($tag4);

        $tag5 = new Tag();
        $tag5->setTag('Tag 5');
        $manager->persist($tag5);

        $tag6 = new Tag();
        $tag6->setTag('Tag 6');
        $manager->persist($tag6);

        $tag7 = new Tag();
        $tag7->setTag('Tag 7');
        $manager->persist($tag7);

        $tag8 = new Tag();
        $tag8->setTag('Tag 8');
        $manager->persist($tag8);

        $tag9 = new Tag();
        $tag9->setTag('Tag 9');
        $manager->persist($tag9);

        $tag10 = new Tag();
        $tag10->setTag('Tag 10');
        $manager->persist($tag10);

        $tag11 = new Tag();
        $tag11->setTag('Tag 11');
        $manager->persist($tag11);

        $tag12 = new Tag();
        $tag12->setTag('Tag 12');
        $manager->persist($tag12);

        $tag13 = new Tag();
        $tag13->setTag('Tag 13');
        $manager->persist($tag13);

        $tag14 = new Tag();
        $tag14->setTag('Tag 14');
        $manager->persist($tag14);

        $tag15 = new Tag();
        $tag15->setTag('Tag 15');
        $manager->persist($tag15);

        $tag16 = new Tag();
        $tag16->setTag('Tag 16');
        $manager->persist($tag16);

        $tag17 = new Tag();
        $tag17->setTag('Tag 17');
        $manager->persist($tag17);

        $tag18 = new Tag();
        $tag18->setTag('Tag 18');
        $manager->persist($tag18);

        $tag19 = new Tag();
        $tag19->setTag('Tag 19');
        $manager->persist($tag19);

        $tag20 = new Tag();
        $tag20->setTag('Tag 20');
        $manager->persist($tag20);

        $manager->flush();

        $this->addReference('tag-1', $tag1);
        $this->addReference('tag-2', $tag2);
        $this->addReference('tag-3', $tag3);
        $this->addReference('tag-4', $tag4);
        $this->addReference('tag-5', $tag5);
        $this->addReference('tag-6', $tag6);
        $this->addReference('tag-7', $tag7);
        $this->addReference('tag-8', $tag8);
        $this->addReference('tag-9', $tag9);
        $this->addReference('tag-10', $tag10);
        $this->addReference('tag-11', $tag11);
        $this->addReference('tag-12', $tag12);
        $this->addReference('tag-13', $tag13);
        $this->addReference('tag-14', $tag14);
        $this->addReference('tag-15', $tag15);
        $this->addReference('tag-16', $tag16);
        $this->addReference('tag-17', $tag17);
        $this->addReference('tag-18', $tag18);
        $this->addReference('tag-19', $tag19);
        $this->addReference('tag-20', $tag20);
    }

    public function getOrder()
    {
        return 20;
    }
}