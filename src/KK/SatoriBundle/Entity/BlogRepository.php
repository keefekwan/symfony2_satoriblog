<?php

namespace KK\SatoriBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlogRepository extends EntityRepository
{
    public function getBlogs()
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b')
            ->addOrderBy('b.created', 'DESC');

        return $qb->getQuery()
            ->getResult();
    }

    public function getBlogsByMonth($year, $month)
    {
        // Query for blog posts in each month
        $date = new \DateTime("{$year}-{$month}-01");
        $toDate = clone $date;
        $toDate->modify("next month midnight -1 second");

        $qb = $this->createQueryBuilder('b')
            ->where('b.created BETWEEN :start AND :end')
            ->addOrderBy('b.created', 'DESC')
            ->setParameter('start', $date)
            ->setParameter('end', $toDate);

        return $qb->getQuery()->getResult();
    }

    public function getBlogsByCategory()
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b, c, tag')
            ->leftJoin('b.category', 'c')
            ->leftJoin('b.tags', 'tag')
            ->addOrderBy('b.created', 'DESC');

        return $qb->getQuery()
            ->getResult();
    }
}
