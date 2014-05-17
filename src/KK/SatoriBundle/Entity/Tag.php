<?php
// src/KK/SatoriBundle/Entity/Tag.php

namespace KK\SatoriBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="KK\SatoriBundle\Entity\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="tag", type="string", length=255, unique=true)
     */
    private $tag;

    /**
     * @ORM\ManyToMany(targetEntity="Blog", mappedBy="tags")
     */
    protected $blogs;

    public function __construct()
    {
        $this->blogs = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTag() ? $this->getTag() :  "";
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
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add blogs
     *
     * @param \KK\SatoriBundle\Entity\Blog $blogs
     * @return Tag
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
