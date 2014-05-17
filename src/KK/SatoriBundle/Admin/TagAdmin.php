<?php
// src/KK/SatoriBundle/Controller/TagAdmin.php

namespace KK\SatoriBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class TagAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'tag'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('tag')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('tag')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('tag')
        ;
    }
}