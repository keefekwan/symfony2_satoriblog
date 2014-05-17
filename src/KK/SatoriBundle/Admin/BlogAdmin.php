<?php
// src/KK/SatoriBundle/Controller/BlogAdmin.php

namespace KK\SatoriBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use KK\SatoriBundle\Entity\Blog;

class BlogAdmin extends Admin
{
    // Setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'created_at',
        '_sort_by'    => 'created_at',
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('category')
            ->add('tags')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('file', 'file', array(
                'label' => 'Image',
                'required' => false,
            ))
            ->add('created')
            ->add('updated')
        ;
    }

    public function configureDatagridFilter(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('category')
            ->add('tags')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('image')
            ->add('created')
            ->add('updated')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('category')
            ->add('tags')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('image')
            ->add('created')
            ->add('updated')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show'   => array(),
                    'edit'   => array(),
                    'delete' => array(),
                )
            ));
    }

    public function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('category')
            ->add('tags')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('webPath', 'string', array(
                'template' => 'KKSatoriBundle:BlogAdmin:list_image.html.twig'
            ))
            ->add('created')
            ->add('updated')
        ;
    }

    public function getBatchActions()
    {
        // Retrieve the default (currently only the delete action) actions
        $actions = parent::getBatchActions();

        // Check user permissions
        if($this->hasRoute('edit') && $this->isGranted('EDIT') && $this->hasRoute('delete') && $this->isGranted('DELETE')) {
            $actions['extend'] = array(
                'label'            => 'Extend',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );

            $actions['deleteNeverActivated'] = array(
                'label'            => 'Delete never activated jobs',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );
        }

        return $actions;
    }
}