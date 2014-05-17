<?php
// src/KK/SatoriBundle/Entity/Category.php

namespace KK\SatoriBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="KK\SatoriBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="category")
     */
    protected $blogs;

    public function __construct()
    {
        $this->blogs = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitle() ? $this->getTitle() :  "";
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add blogs
     *
     * @param \KK\SatoriBundle\Entity\Blog $blogs
     * @return Category
     */
    public function addBlog(\KK\SatoriBundle\Entity\Blog $blogs)
    {
        $this->blogs[] = $blogs;

        return $this;
    }

    /**
     * Remove blogs
     *
     * @param \KK\SatoriBundle\Entity\Blog $blogs
     */
    public function removeBlog(\KK\SatoriBundle\Entity\Blog $blogs)
    {
        $this->blogs->removeElement($blogs);
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogs()
    {
        return $this->blogs;
    }
}
