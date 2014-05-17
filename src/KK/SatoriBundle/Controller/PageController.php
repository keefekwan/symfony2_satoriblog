<?php
// src/KK/SatoriBundle/Controller/PageController.php

namespace KK\SatoriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KK\SatoriBundle\Entity\Category;
use KK\SatoriBundle\Entity\Blog;
use Doctrine\Common\Collections;

class PageController extends Controller
{
    /**
     * @Route("/", name="KKSatoriBundle_home")
     * @Method({"GET"})
     * @Template("KKSatoriBundle:Page:index.html.twig")
     */
    public function indexAction()
    {
        // Search code: calling from the service Search
        $query = $this->get('search');
        $results = $query->search();

        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('KKSatoriBundle:Blog')
            ->getBlogs();

        if (!$blogs) {
            throw $this->createNotFoundException('No blogs found');
        }

        return array(
            'blogs'   => $blogs,
            'query'   => $query,
            'results' => $results,
        );
    }

    /**
     * @Route("/category/{category}", name="KKSatoriBundle_category")
     * @Method({"GET"})
     * @Template("KKSatoriBundle:Page:category.html.twig")
     */
    public function categoryAction($category = null)
    {
        // Search function using code from Services/Search.php
        $query = $this->get('search');
        $results = $query->search();

        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('KKSatoriBundle:Category')
            ->findOneByTitle($category);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find blog posts');
        }

        $blogs = $category->getBlogs(); // Gets blogs from each category selected

        return array(
            'blogs'    => $blogs,
            'category' => $category,
            'results'  => $results,
        );
    }

    /**
     * @Route("/archive/{year}/{month}", name="KKSatoriBundle_archive")
     * @Template("KKSatoriBundle:Page:archive.html.twig")
     */
    public function archiveAction($year = null, $month = null)
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('KKSatoriBundle:Blog')
            ->getBlogsByMonth($year, $month);

        if (!$blogs) {
            throw $this->createNotFoundException('Unable to find blog posts');
        }

        return array(
            'blogs' => $blogs,
        );
    }

    /**
     * @Route("/tag/{tag}", name="KKSatoriBundle_tag")
     * @Template("KKSatoriBundle:Page:tag.html.twig")
     */
    public function tagAction($tag)
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('KKSatoriBundle:Tag')
            ->findOneByTag($tag);

        $blogs = $tags->getBlogs(); // Gets blogs from each tag selected

        return array(
            'blogs' => $blogs,
        );
    }

    /**
     * @Template("KKSatoriBundle:Page:footer.html.twig")
     */
    public function footerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recentBlogLimit = $this->container->getParameter('kk_satori.latest.blogs_limit');

        $latestBlogs = $em->getRepository('KKSatoriBundle:Blog')
            ->getBlogs($recentBlogLimit);

        $blogs = $em->getRepository('KKSatoriBundle:Blog')
            ->getBlogs();

        $tagWeights = $em->getRepository('KKSatoriBundle:Tag') // getTagWeights from TagRepository weighs the tags from blogs
            ->getTagWeights($blogs);

        return array(
            'latestBlogs' => $latestBlogs,
            'tags'        => $tagWeights,
        );
    }
}
