<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Home for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Home\Controller;


class ConsultativeController extends BaseController
{    
    public function indexAction()
    {
        $num_per_page = 10;
        $page = $this->params()->fromRoute('page');
        
        $repo = $this->getEntityManager()->getRepository('Admin\Entity\ShopncConsultative');
        $result = $repo->getAllConsultative();
        //$total = $repo->getTotalNum();
        
        $paginator = $this->_set_paginator($result, $num_per_page);//, $total);

        return array('paginator' => $paginator);
    }
    
}
