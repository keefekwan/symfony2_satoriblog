<?php
// src/KK/SatoriBlogBundle/Controller/BlogController.php

namespace KK\SatoriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    /**
     * @Route("/about", name="KKSatoriBundle_about")
     * @Method("GET")
     * @Template("KKSatoriBundle:Blog:about.html.twig")
     */
    public function aboutAction()
    {
        return array();
    }

    /**
     * @Route("/search", name="KKSatoriBundle_search")
     * @Template("KKSatoriBundle:Page:search.html.twig")
     */
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Search code: calling from the service Search
        $query = $this->get('search');

        $results = $query->search();

        $recentBlogLimit = $this->container->getParameter('kk_satori.latest.blogs_limit');

        $latestBlogs = $em->getRepository('KKSatoriBundle:Blog')
            ->getBlogs($recentBlogLimit);

        $tags = $em->getRepository('KKSatoriBundle:Tag')
            ->getTags();

        return array(
            'query'        => $query,
            'results'      => $results['results'],
            'latestBlogs'  => $latestBlogs,
            'tags'         => $tags,
        );
    }

    /**
     * @Route("/{slug}", name="KKSatoriBundle_show")
     * @Method("GET")
     * @Template("KKSatoriBundle:Blog:show.html.twig")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('KKSatoriBundle:Blog')->findOneBy(array(
            'slug' => $slug,
        ));

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find blog post');
        }

        return array(
            'blog' => $blog,
            'slug' => $slug,
        );
    }
}