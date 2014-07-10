<?php
namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as CollectionAdapter;
use Zend\Paginator\Paginator;

class BaseController extends AbstractActionController
{
	function __construct(){
	}

    public function _get_auth_service()
    {
        return false;
    }

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        if (null == $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
    public function _set_paginator($array, $item_per_page)//, $total)
    {
        $doctrine_collection = new ArrayCollection($array);
        $adapter = new CollectionAdapter($doctrine_collection);
        
        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($this->params()->fromRoute('page'))
                  ->setItemCountPerPage($item_per_page)
                  //->setPageRange($total)        
        ;
        
        return $paginator;
    }
}