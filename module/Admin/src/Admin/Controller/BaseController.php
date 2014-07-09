<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

class BaseController extends AbstractActionController
{
	function __construct(){
	    //登录验证
	}

	public function getAuthService()
	{
// 		return $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
		return $this->getServiceLocator()->get('Admin_AuthService');
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

	/**
	 * 用户登录验证
	 * */
	private function _isLogin($url=''){}
}