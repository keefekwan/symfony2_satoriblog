<?php
// src/KK/SatoriBundle/Services/Search.php

namespace KK\SatoriBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Bundle\DoctrineBundle\Registry;

class Search
{
    protected $request;

    public function __construct(RequestStack $requestStack, Registry $doctrine)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->doctrine = $doctrine;
    }

    public function search()
    {
        $results = null;
        $query = $this->request->query->get('q');

        if (!empty($query)) {
            $em = $this->doctrine->getManager();

            $results = $em->createQueryBuilder()
                ->from('KKSatoriBundle:Blog', 'b')
                ->select('b')
                ->where('b.title LIKE :search')
                ->addOrderBy('b.created', 'DESC')
                ->setParameter('search', "%${query}%")
                ->getQuery()
                ->getResult();
        }

        return array(
            'query'   => $query,
            'results' => $results,
        );
    }

}
