<?php
// src/KK/SatoriBundle/DataFixtures/ORM/LoadBlogs.php

namespace KK\SatoriBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use KK\SatoriBundle\Entity\Blog;
use KK\SatoriBundle\Entity\Category;
use KK\SatoriBundle\Entity\Tag;

class LoadBlogs extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setCategory($manager->merge($this->getReference('category-1')));
        $blog1->addTag($manager->merge($this->getReference('tag-1')));
        $blog1->addTag($manager->merge($this->getReference('tag-3')));
        $blog1->addTag($manager->merge($this->getReference('tag-5')));
        $blog1->addTag($manager->merge($this->getReference('tag-2')));
        $blog1->addTag($manager->merge($this->getReference('tag-12')));
        $blog1->addTag($manager->merge($this->getReference('tag-13')));
        $blog1->addTag($manager->merge($this->getReference('tag-14')));
        $blog1->addTag($manager->merge($this->getReference('tag-15')));
        $blog1->setTitle('Lorem Ipsum2');
        $blog1->setBlog('Lorem ipsum dolor sit amet, <img class="alignright" alt="" width="290" height="275" src="{{ asset([\'/images/\', blog.image]|join) }}" /> consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p><em>With the increasing number of people who are now dealing with chronic illnesses, many are searching for a way to learn and understand more about everything that revolves on nutrition to achieve healthy lifestyle. One of the best ways that one can consider is to seek for an online nutrition course.</em></p>Online nutrition course is offered by various institutions and even some health organizations. This provides an education for those who want to find answers to their questions regarding nutrition. This will also provide more benefits most particularly for those who are dealing with some issues on health as well as nutrition.
<img class="alignleft" src="http://news.vanderbilt.edu/files/nutrition1.jpg" alt="" width="290" height="275" /><em>Once you have decided to look for an online nutrition course, the first thing you need to search is the institution where you will take it. After this, knowing their curriculum and how they teach is also important. Since you are going to take a course online, you should know the documents needed or other requirements. Know when you can complete the course. Also, the accreditation of the school is also vital. It is essential to get a certification or degree from an accredited institution because this may also have a huge impact especially if you are planning to pursue a career in the field of nutrition.</em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $blog1->setImage('image.jpg');
        $blog1->setAuthor('KK');
        $blog1->setCreated(new \DateTime("2014-04-23 21:03:02"));
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setCategory($manager->merge($this->getReference('category-2')));
        $blog2->addTag($manager->merge($this->getReference('tag-2')));
        $blog2->addTag($manager->merge($this->getReference('tag-4')));
        $blog2->addTag($manager->merge($this->getReference('tag-20')));
        $blog2->addTag($manager->merge($this->getReference('tag-6')));
        $blog2->addTag($manager->merge($this->getReference('tag-15')));
        $blog2->setTitle('Lorem Ipsum1');
        $blog2->setBlog('<p><img class="wp-post-image" style="float: left; margin-right: 10px;" alt="how to lose weight fast and safe" src="http://www.nhs.uk/Livewell/loseweight/PublishingImages/lose-weight-fast_377x171_CYEGTY.jpg" width="238" />This LinkedIn Company Profile was created by LinkedIn and is about <strong>Lose Weight Fast No Diet</strong>. This page is not endorsed by or affiliated with Lose Weight Fast No Diet. For questions regarding LinkedIn Company Profiles contact us This article will address how can you lose weight fast, from the standpoint of legitimate ways to lose weight fast. For quick ways to lose weight using whatever method possible, check out the link to the left &#8220;quick weight loss&#8221;<strong>. Losing Weight Comes Down Losing Or Burning More Calories Than You Consume</strong></p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $blog2->setImage('image.jpg');
        $blog2->setAuthor('KK');
        $blog2->setCreated(new \DateTime("2014-05-07 19:47:12"));
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setCategory($manager->merge($this->getReference('category-1')));
        $blog3->addTag($manager->merge($this->getReference('tag-1')));
        $blog3->addTag($manager->merge($this->getReference('tag-3')));
        $blog3->addTag($manager->merge($this->getReference('tag-2')));
        $blog3->addTag($manager->merge($this->getReference('tag-16')));
        $blog3->addTag($manager->merge($this->getReference('tag-14')));
        $blog3->addTag($manager->merge($this->getReference('tag-17')));
        $blog3->addTag($manager->merge($this->getReference('tag-13')));
        $blog3->setTitle('Lorem Ipsum3');
        $blog3->setBlog('Lorem ipsum dolor sit amet, consectetur adipisicing elit, {% set src = \'images/\' ~ blog.image %} <img class="alignleft" src="{{ asset( src ) }}" alt="" width="290" height="275" />sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fasting is a great tool for attaining your desired weight</strong> Fasting to lose weight is best undertaken as a jumping off point, leading you into better eating behaviors and a more healthy lifestyle, as these better decisions will be made easily and naturally. If you&#8217;re paying attention to your emotional being during a fast , many doors will be opened.</p>
<div style="text-align: center;"><iframe src="http://www.youtube.com/embed/JGAIMIfNS-c" height="336" width="480" allowfullscreen="" frameborder="0"></iframe></div>');
        $blog3->setImage('image.jpeg');
        $blog3->setAuthor('KK');
        $blog3->setCreated(new \DateTime("2014-03-21 09:11:03"));
        $blog3->setUpdated($blog3->getCreated());
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setCategory($manager->merge($this->getReference('category-3')));
        $blog4->addTag($manager->merge($this->getReference('tag-2')));
        $blog4->addTag($manager->merge($this->getReference('tag-6')));
        $blog4->addTag($manager->merge($this->getReference('tag-7')));
        $blog4->addTag($manager->merge($this->getReference('tag-8')));
        $blog4->addTag($manager->merge($this->getReference('tag-18')));
        $blog4->addTag($manager->merge($this->getReference('tag-14')));
        $blog4->addTag($manager->merge($this->getReference('tag-13')));
        $blog4->setTitle('Lorem Ipsum4');
        $blog4->setBlog('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. This will also help clients carry out different kinds of <strong>transactional activities efficiently and quickly</strong> such as electronic fund transfer, loan application and repayment, wire transfers, and buying investment products. This also gives makes it more convenient for bank clients to perform non transactional transactions such as check book ordering, account balance viewing, e-<strong>banking</strong> application downloading, and bank statement downloading. All of these can be done without having to wait in line.</p>
<p>Another good thing about online banking is the fact that it charges lower fees than regular banks. This is</p>
<p><img class="alignright" alt="" src="http://i.kinja-img.com/gawker-media/image/upload/s--Ki0gC8mN--/18cavxsdouoznjpg.jpg" width="190" height="266" /></p>
<p>because online banks have lower overhead than traditional banks. Aside from this, this type of banking also enables you to manage your finances since all your transactions and information that you need can be accessed anytime you want with just a touch of a button. <strong>You no longer have to wait</strong> for the bank statements that your bank will mail to you every month.</p>
<p>In addition, most online banks are also offering innovative ways for their clients to have a much better experience than what a physical bank can offer.');
        $blog4->setImage('image.jpg');
        $blog4->setAuthor('KK');
        $blog4->setCreated(new \DateTime("2014-02-12 06:32:03"));
        $blog4->setUpdated($blog4->getCreated());
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setCategory($manager->merge($this->getReference('category-5')));
        $blog5->addTag($manager->merge($this->getReference('tag-5')));
        $blog5->addTag($manager->merge($this->getReference('tag-4')));
        $blog5->addTag($manager->merge($this->getReference('tag-6')));
        $blog5->addTag($manager->merge($this->getReference('tag-19')));
        $blog5->addTag($manager->merge($this->getReference('tag-3')));
        $blog5->addTag($manager->merge($this->getReference('tag-13')));
        $blog5->addTag($manager->merge($this->getReference('tag-2')));
        $blog5->addTag($manager->merge($this->getReference('tag-18')));
        $blog5->addTag($manager->merge($this->getReference('tag-9')));
        $blog5->addTag($manager->merge($this->getReference('tag-10')));
        $blog5->setTitle('Lorem Ipsum5');
        $blog5->setBlog('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. If your purpose is to spy your kids in order to know if they are candid with you or even find out who is calling you, this kind of mobile application can be a great help. In order for you to be familiar with this kind of mobile application that is usually used in Android phone, here are some of them.</p>
<p><iframe width="500" height="281" src="http://www.youtube.com/embed/WBhHauOC4aY?feature=oembed" frameborder="0" allowfullscreen></iframe></p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $blog5->setImage('image.jpg');
        $blog5->setAuthor('KK');
        $blog5->setCreated(new \DateTime("2014-01-29 23:23:03"));
        $blog5->setUpdated($blog5->getCreated());
        $manager->persist($blog5);

        $manager->flush();
    }

    public function getOrder()
    {
        return 30;
    }
}