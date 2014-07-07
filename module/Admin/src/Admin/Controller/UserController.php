<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Admin\Form\CustomerForm;
use Admin\Filter\ShopncCustomerFilter;
use Admin\Entity\ShopncCustomer;

class UserController extends AbstractActionController
{
	protected  $customerTbable;
	
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
		if($this->em == null){
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');	
		}
		return $this->em;
	}
	
	public function getRepository()
	{
		if (null === $this->em)
			$this->em = $this->getEntityManager()->getRepository('User\Entity\ShopncCustomer');
		return $this->em;
	}

	public function indexAction()
	{
		$request = $this->getRequest();
		$users = $this->getEntityManager()->getRepository('Admin\Entity\ShopncCustomer')->findAll();
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
        //设置当前页数
        $paginator->setCurrentPageNumber($request->getQuery('page'));
        //设置一页要返回的结果条数
        $paginator->setItemCountPerPage(5);
        $view = new ViewModel();
        $view->setVariable('paginator', $paginator);
        return $view;     
	}
	
	public function addAction()
	{
		$form = new CustomerForm();
		$form->get('submit')->setValue('Add');
		
		$request = $this->getRequest();
		if($request->isPost()){
			$user = new ShopncCustomer();
			$filter = new ShopncCustomerFilter();
			$form->setInputFilter($filter);
			$form->setData($request->getPost());

			if($form->isValid()){
				$user->populate($form->getData());
				$user->setMemberTime(time());
				$user->setAuthorize(0);
				$this->getEntityManager()->persist($user);
				$this->getEntityManager()->flush();
				return $this->redirect()->toRoute('admin_user');
			}
		}
		return array('form' => $form);
	}
	
	public function editAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if(!id){
			return $this->redirect()->toRoute('admin_user', array('action' => 'add'));
		}
		try{
			$user = $this->getEntityManager()->find('Admin\Entity\ShopncCustomer', $id);
		}catch(\Exception $ex){
			return $this->redirect()->toRoute('admin_user', array('action' => 'index'));
		}
		
		$form = new CustomerForm();
		$form->bind($user);
		$form->get('submit')->setAttribute('value', 'Edit');
		
		$request = $this->getRequest();
		if($request->isPost()){
			/*$user = new ShopncCustomer();
			$filter = new ShopncCustomerFilter();
			$form->setInputFilter($filter);*/
			$form->setData($request->getPost());
			
			if($form->isValid()){
				$form->bindValues();
				$this->getEntityManager()->flush();
				
				return $this->redirect()->toRoute('admin_user');
			}
		}
		return array('id' => $id, 'form' => $form);
	}
	
	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if(!id){
			return $this->redirect()->toRoute('admin_user');
		}
		
		$user = $this->getEntityManager()->find('Admin\Entity\ShopncCustomer', $id);
		if ($user) {
			$this->getEntityManager()->remove($user);
			$this->getEntityManager()->flush();
		}
		
		return $this->redirect()->toRoute('admin_user');
	}
	
}

?>