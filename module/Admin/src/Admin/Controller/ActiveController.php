<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-9
 * Time: 下午6:46
 */
namespace Admin\Controller;

use Admin\Controller\BaseController;
use Admin\Form\ActiveExamineForm;

class ActiveController extends BaseController
{
    /**
     * 未审核咨询列表
     * */
    public function untreatedActiveListAction()
    {
        $request = $this->getRequest();
        if ($request->isGet()) {
            $pageNumberOld = $request->getQuery()->page;
        }
        $maxlist = 5;
        $dql = "SELECT sm FROM Admin\Entity\ShopncConsultative sm WHERE sm.status = 0 ORDER BY sm.insertTime DESC ";
        $vm = $this->fenye($dql, $maxlist, $pageNumberOld);
        return $vm;
    }
    /**
     *咨询审核
    **/
    public function activeExamineAction(){

        $activeId = $this->getRequest()->getQuery()->id;
        $form = new ActiveExamineForm($activeId);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

       // $form->setData($post);
        //$data = $form->getData();
        echo '<pre>';
        var_dump($post);
            exit;
        }
        if(empty($activeId)){
            $error = '请重新选择审核';
        }
        /*咨询信息*/
        $em = $this->getEntityManager();
        /* a = ShopncConsultative ,b = ShopncCustomer */
        $field = "a , b";
        $where = "a.activeId=".$activeId;
        $dql = "SELECT $field FROM Admin\Entity\ShopncConsultative a LEFT" .
            " JOIN Admin\Entity\ShopncCustomer b WITH a.memberId = b.memberId where $where";
        $query = $em->createQuery($dql);
        $result = $query->getArrayResult();
        return array('list' => $result , 'form'=>$form);
    }
}