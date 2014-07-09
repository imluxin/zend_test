<?php
namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

class BaseController extends AbstractActionController
{
	function __construct(){
		echo date('Y-m-d','1402552000');
	    /* echo '<pre>';
	    print_r($this->getServiceLocator()->get('Home\AuthService'));
	    exit; */
	}

    public function _get_auth_service()
    {

//         return $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        return $this->getServiceLocator()->get('Home_AuthService');
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
}