<?php
namespace Admin\Controller;

use Admin\Controller\BaseController;
use Admin\Entity\ShopncProduct;
use Admin\Filter\ProductFilter;
use Admin\Form\ProductForm;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProductController extends BaseController{

	/**
	 * 产品列表
	 * */
	public function indexAction(){
		$query = $this->getEntityManager()->createQuery("select cl from Admin\Entity\ShopncProduct cl order by cl.sort asc");
		$res = $query->getResult();
		return array(
				'ac_class'=>$res,
				'title'=>'产品列表'
				);
	}

	/**
	 * 添加产品
	 * */
	public function addAction(){
		$form = new ProductForm();
		$form->get('submit')->setValue('提交');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$ac_class = new ShopncProduct();
			$filter = new ProductFilter();
			$form->setInputFilter($filter);
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$ac_class->populate($form->getData());
				$this->getEntityManager()->persist($ac_class);
				$this->getEntityManager()->flush();

				return $this->redirect()->toRoute('admin_product');
			}
		}
		return array(
				'form'=>$form,
				'title'=>'添加产品',
		);
	}

	/**
	 * 编辑产品
	 * */
	public function editAction(){
		$id = (int)$this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('admin_product');
		}
		try {
			$ac = $this->getEntityManager()->find('Admin\Entity\ShopncProduct', $id);
		} catch (\Exception $ex) {
			return $this->redirect()->toRoute('admin_product');
		}

		$form = new ProductForm();
		$form->bind($ac);
		$form->get('submit')->setAttribute('value', '提交');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$form->bindValues();
				$this->getEntityManager()->flush();

				return $this->redirect()->toRoute('admin_product');
			}
		}
		return array('id'=>$id, 'form'=>$form,'title'=>'编辑产品');
	}

	/**
	 * 删除产品
	 * */
	public function delAction(){
		$request = $this->getRequest();
		$id = $request->getQuery('ckid');

		$where = '';
		if(is_array($id) && !empty($id)){
			$id = implode(',',$id);
			$where = " where p.proId in ({$id})";
		}else if(intval($id)){
		    $where = " where p.proId='{$id}'";
		}else{
			return $this->redirect()->toRoute('admin_product');
		}
		$query = $this->getEntityManager()->createQuery("delete Admin\Entity\ShopncProduct p {$where}");
		$res = $query->getResult();

		return $this->redirect()->toRoute('admin_product');
	}

	/**
	 * 产品排序
	 * */
	public function sortAction(){
		$request = $this->getRequest();
		$id = (int)$request->getQuery('id');
		if ($id) {
			$ac_class = $this->getEntityManager()->find('Admin\Entity\ShopncProduct', $id);
			$ac_class->setSort($request->getQuery('sort'));
			$this->getEntityManager()->persist($ac_class);
			$this->getEntityManager()->flush();
		}
		return $this->redirect()->toRoute('admin_product');exit;
	}

}