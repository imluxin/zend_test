<?php
namespace Admin\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Zend\View\Helper\ViewModel;
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
    /**
     * 分页方法
     * $dql 查询dql语句
     * $maxlist 每页显示条数
     * $pageNumberOld 当前页数
     * */
    public function fenye($dql,$maxlist,$pageNumberOld){
        $firstResult = 0;
        if($pageNumberOld == null){
            $pageNumberOld = 1;
        }
        if($pageNumberOld == 1){
            $firstResult = 0;
        } else {
            $pageNumberNew = $pageNumberOld * $maxlist;
            $firstResult = $pageNumberNew-$maxlist;
        }
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery($dql)
            ->setFirstResult($firstResult)
            ->setMaxResults($maxlist);
        $paginator = new Paginator($query, $fetchJoinCollection = true);
        $countNumber = count($paginator);
        $bugs = $query->getArrayResult();
        $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\null($countNumber));
        $paginator->setCurrentPageNumber($pageNumberOld)->setItemCountPerPage($maxlist);
        $vm = new \Zend\View\Model\ViewModel();
        $vm->setVariables(array('paginator'=>$paginator,'bugs'=>$bugs));
        return $vm;
    }
}