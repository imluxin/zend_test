<?php
namespace Admin\Controller;

use Admin\Form\AlbumForm;
use Admin\Entity\Album;
use Admin\Filter\AlbumFilter;

class AlbumController extends BaseController
{    
    public function indexAction()
    {
        $repo = $this->getEntityManager()->getRepository('Admin\Entity\Album');
        $albums = $repo->getAllAlbums();
        
        return array('albums' => $albums);
    }
    
    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$album = new Album();
        	$filter = new AlbumFilter();
        	$form->setInputFilter($filter);
        	$form->setData($request->getPost());
        	
        	if ($form->isValid()) {
        		$album->populate($form->getData());
        		$this->getEntityManager()->persist($album);
        		$this->getEntityManager()->flush();
        		
        		return $this->redirect()->toRoute('admin_album');
        	}
        }
        return array('form'=>$form);
    }
    
    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
        	return $this->redirect()->toRoute('admin_album', array('action'=>'add'));
        }
        try {
            $album = $this->getEntityManager()->find('Admin\Entity\Album', $id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('admin_album', array('action'=>'index'));
        }
        
        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$form->setData($request->getPost());
        	
        	if ($form->isValid()) {
        	    $form->bindValues();
        	    $this->getEntityManager()->flush();
        		
        		return $this->redirect()->toRoute('admin_album');
        	}
        }
        return array('id'=>$id, 'form'=>$form);
    }
    
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
        	return $this->redirect()->toRoute('admin_album');
        }
        
        $album = $this->getEntityManager()->find('Admin\Entity\Album', $id);
        if ($album) {
        	$this->getEntityManager()->remove($album);
        	$this->getEntityManager()->flush();
        }
        
        return $this->redirect()->toRoute('admin_album');
    }
}