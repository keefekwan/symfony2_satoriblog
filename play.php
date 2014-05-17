<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
use KK\SatoriBundle\Entity\Blog;
use KK\SatoriBundle\Entity\Category;

$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

## EX1: Rendering a template from command line (php play.php)
//$templating = $container->get('templating');
//
//echo $templating->render('KKEventSchedulerBundle:Default:index.html.twig', array(
//    'name'  => 'Fuck you!!!',
//    'count' => 20,
//));

## EX2: Inserting data into database from command line (php play.php)
//$event = new Event();
//$event->setName('Vintage Wine Merchants');
//$event->setTime(new \DateTime('tomorrow noon'));
//$event->setLocation('377 Santana Row, Suite 1135 San Jose, CA 95128');
//$event->setDetails('North by Northeast Italy');
//
//$em = $container->get('doctrine')->getManager();
//
//$em->persist($event);
//$em->flush();

## EX3: Querying for user object and dumping the events assigned to the user
$em = $container->get('doctrine')->getEntityManager();

$id = 1;

$user = $em->getRepository('KKSatoriBundle:Category')->find($id);

$blog = $user->getBlogs();

foreach ($blog as $blogs) {
    echo $blogs->getTitle();
}

var_dump($user);

## EX4: Change a user's password and flush changes to Doctrine
//$em = $container->get('doctrine')->getEntityManager();
//
//$user = $em->getRepository('KKUserBundle:User')->findOneBy(array(
//    'username' => 'user',
//));
//
//$user->setPlainPassword('new');
//$em->persist($user);
//$em->flush();

