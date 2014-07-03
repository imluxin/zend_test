<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
//use Album\Model\Album;
use Doctrine\ORM\EntityManager;
use Album\Entity\Album;

class AlbumController extends AbstractActionController
{
    protected $albumTable;

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
    
    public function indexAction()
    {
        $albums = $this->getEntityManager()->getRepository('Album\Entity\Album')->findAll();
        return array('albums' => $albums);
    }
    
    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$album = new Album();
        	$form->setInputFilter($album->getInputFilter());
        	$form->setData($request->getPost());
        	
        	if ($form->isValid()) {
        		$album->populate($form->getData());
        		$this->getEntityManager()->persist($album);
        		$this->getEntityManager()->flush();
        		
        		return $this->redirect()->toRoute('album');
        	}
        }
        return array('form'=>$form);
    }
    
    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
        	return $this->redirect()->toRoute('album', array('action'=>'add'));
        }
        try {
            $album = $this->getEntityManager()->find('Album\Entity\Album', $id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('album', array('action'=>'index'));
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
        		
        		return $this->redirect()->toRoute('album');
        	}
        }
        return array('id'=>$id, 'form'=>$form);
    }
    
    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
        	return $this->redirect()->toRoute('album');
        }
        
        $album = $this->getEntityManager()->find('Album\Entity\Album', $id);
        if ($album) {
        	$this->getEntityManager()->remove($album);
        	$this->getEntityManager()->flush();
        }
        
        return $this->redirect()->toRoute('album');
    }
}