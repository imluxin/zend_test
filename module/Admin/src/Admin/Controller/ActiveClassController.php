<?php
namespace Admin\Controller;

use Admin\Controller\BaseController;
use Admin\Entity\ShopncClass;
use Admin\Filter\ShopncActiveClassFilter;
use Admin\Form\ActiveClassForm;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ActiveClassController extends BaseController{

	/**
	 * 分类列表
	 * */
	public function indexAction(){
		$res = $this->getEntityManager()->getRepository("Admin\Entity\ShopncClass")->findAll();
		return array(
				'ac_class'=>$res,
				'title'=>'咨询分类列表'
				);
	}

	/**
	 * 添加分类
	 * */
	public function addAction(){
		$form = new ActiveClassForm();
		$form->get('submit')->setValue('提交');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$ac_class = new ShopncClass();
			$filter = new ShopncActiveClassFilter();
			$form->setInputFilter($filter);
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$ac_class->populate($form->getData());
				$this->getEntityManager()->persist($ac_class);
				$this->getEntityManager()->flush();

				return $this->redirect()->toRoute('admin_active_class');
			}
		}
		return array('form'=>$form);
	}

	/**
	 * 编辑分类
	 * */
	public function editAction(){}

	/**
	 * 删除分类
	 * */
	public function delAction(){}

	/**
	 * 分类排序
	 * */
	public function sortAction(){}

}