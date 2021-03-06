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
		$query = $this->getEntityManager()->createQuery("select cl from Admin\Entity\ShopncClass cl order by cl.sort asc");
		$res = $query->getResult();
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
		return array(
				'form'=>$form,
				'title'=>'添加咨询分类',
		);
	}

	/**
	 * 编辑分类
	 * */
	public function editAction(){
		$id = (int)$this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('admin_active_class');
		}
		try {
			$ac = $this->getEntityManager()->find('Admin\Entity\ShopncClass', $id);
		} catch (\Exception $ex) {
			return $this->redirect()->toRoute('admin_active_class');
		}

		$form = new ActiveClassForm();
		$form->bind($ac);

		$form->get('submit')->setAttribute('value', '提交');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$form->bindValues();
				$this->getEntityManager()->flush();

				return $this->redirect()->toRoute('admin_active_class');
			}
		}
		return array('id'=>$id, 'form'=>$form,'title'=>'编辑咨询分类');
	}

	/**
	 * 删除分类
	 * */
	public function delAction(){
		$request = $this->getRequest();
		$id = $request->getQuery('ckid');

		$where = '';
		if(is_array($id) && !empty($id)){
			$id = implode(',',$id);
			$where = " where ac.classId in ({$id})";
		}else if(intval($id)){
			$where = " where ac.classId='{$id}'";
		}else{
			return $this->redirect()->toRoute('admin_active_class');
		}
		$query = $this->getEntityManager()->createQuery("delete Admin\Entity\ShopncClass ac {$where}");
		$res = $query->getResult();

		return $this->redirect()->toRoute('admin_active_class');
	}

	/**
	 * 分类排序
	 * */
	public function sortAction(){
		$request = $this->getRequest();
		$id = (int)$request->getQuery('id');
		if ($id) {
			$ac_class = $this->getEntityManager()->find('Admin\Entity\ShopncClass', $id);
			$ac_class->setSort($request->getQuery('sort'));
			$this->getEntityManager()->persist($ac_class);
			$this->getEntityManager()->flush();
		}
		return $this->redirect()->toRoute('admin_active_class');
	}

}