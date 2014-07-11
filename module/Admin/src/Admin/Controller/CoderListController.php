<?php
/**
 * Created by PhpStorm.
 * User: chijing
 * Date: 14-7-9
 * Time: 下午6:41
 */
namespace Admin\Controller;

use Admin\Form\CoderList\WorkingForm;
use Admin\Filter\CoderList\WorkingFilter;

/**
 *
 * 显示各种列表用户员工
 * Class CoderListController
 * @package Admin\Controller
 */
class CoderlistController extends BaseController
{




    /**
     *  抢单中的列表
     */
    public function alllistAction()
    {
        /*获取workerId*/
        $em = $this->getEntityManager();
        /* a = works ,b = work_grab AND (b.workerId ='')*/
        $field = "a.workId,a.workTitle,a.serverName,a.workStarttime,a.workEndtime,a.workJointime,a.workPoints";
        $where = "(a.workStatus = 0) AND (a.workJointime >" . time() . ") AND b.workerId IS NULL";
        $dql = "SELECT $field FROM Admin\Entity\ShopncWorks a LEFT" .
            " JOIN Admin\Entity\ShopncWorkGrab b WITH a.workId = b.workId where $where" .
            " ORDER BY a.workJointime DESC";
        $query = $em->createQuery($dql);
        $result = $query->getResult();
        return array('list' => $result);
    }

    /**
     * 我抢的单
     */
    public function mylistAction()
    {
        /* TODO:获取用户workerid */
        $workerId = '1';
        /* w= works , wg=workgrab , ww = worksworker */
        //显示字段
        $field = "w.workId," .
            "w.workTitle," .
            "w.serverName," .
            "w.workStarttime," .
            "w.workEndtime," .
            "w.workJointime," .
            "w.workPoints," .
            "w.workStatus";
        $where = "wg.workerId = $workerId";
        $dql = "SELECT $field FROM Admin\Entity\ShopncWorkGrab wg LEFT" .
            " JOIN Admin\Entity\ShopncWorks w WITH w.workId = wg.workId where $where" .
            " ORDER BY w.workJointime DESC";
        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        $result = $query->getResult();
        if ($result[0]['workId'] == null) {
            return null;
        }
        return array('list' => $result);
    }

    /**
     * 显示正在工作中的列表
     * @return array
     */
    public function workingAction()
    {
        /*TODO:获取用户workerId*/
        $workerId = '1';

        $data = $this->getRequest();
        $login_form = new WorkingForm();
        $get_data = $data->getQuery();
        $search_filter = new WorkingFilter();
        $login_form->setInputFilter($search_filter)->setData($get_data);
        $login_form->isValid();
        $em = $this->getEntityManager();
        $query = $em->createQuery($this->_getWorkingDql($workerId, $get_data));
        $result = $query->getResult();
        return array('form' => $login_form, 'list' => $result);
    }

    /**
     *         已提交任务列表
     * @return array
     */
    public function submitedAction()
    {
        /*TODO:获取用户workerId*/
        $workerId = '1';
        $data = $this->getRequest();
        $form = new WorkingForm();
        $get_data = $data->getQuery();
        $search_filter = new WorkingFilter();
        $form->setInputFilter($search_filter)->setData($get_data);
        $form->isValid();
        $em = $this->getEntityManager();
        $query = $em->createQuery($this->_getSubmitDql($workerId, $get_data));
        $result = $query->getResult();
        return array('form' => $form, 'list' => $result);


    }

    /**
     * 经完成的任务
     * @return array
     */
    public function finishAction(){
         /*TODO:获取用户workerId*/
         $workerId = '1';

         $data = $this->getRequest();
         $form = new WorkingForm();
         $get_data = $data->getQuery();
         $search_filter = new WorkingFilter();
         $form->setInputFilter($search_filter)->setData($get_data);
         $form->isValid();
         $em = $this->getEntityManager();
         $query = $em->createQuery($this->_getFinishDql($workerId, $get_data));
         $result = $query->getResult();
         return array('form' => $form, 'list' => $result);
     }

    /**
     *      获取已经完成的任务的dql
     * * @param $workerId
     * @param $data
     * @return string
     */
    private function _getFinishDql($workerId, $data)
    {
        $order_by = $data['orderby'];
        $asc = $data['orderasc'];
        $field = "w.workId," .
            "w.workTitle," .
            "w.serverName," .
            "ww.workPoints," .
            "w.workPriority," .
            "w.workStarttime," .
            "w.workEndtime," .
            "w.workJointime," .
            "w.workType";
        $where = "ww.workerId = $workerId AND w.workStatus > 2 ";
        $dql = "SELECT $field FROM Admin\Entity\ShopncWorks w LEFT" .
            " JOIN Admin\Entity\ShopncWorksWorker ww WITH w.workId = ww.workId where $where" .
            " ORDER BY w.$order_by $asc ";
        return $dql;
    }
     /**
     *      获取已经提交的任务
     * * @param $workerId
     * @param $data
     * @return string
     */
    private function _getSubmitDql($workerId, $data)
    {
        $order_by = $data['orderby'];
        $asc = $data['orderasc'];
        $field = "w.workId," .
            "w.workTitle," .
            "w.serverName," .
            "w.workPoints," .
            "w.workPriority," .
            "w.workStarttime," .
            "w.workEndtime," .
            "w.workJointime," .
            "w.workType";
        $where = "ww.workerId = $workerId AND w.workStatus = 2 ";
        $dql = "SELECT $field FROM Admin\Entity\ShopncWorks w LEFT" .
            " JOIN Admin\Entity\ShopncWorksWorker ww WITH w.workId = ww.workId where $where" .
            " ORDER BY w.$order_by $asc ";
        return $dql;
    }

    /**
     *      获取正在工作的任务的dql
     * * @param $workerId
     * @param $post_data
     * @return string
     */
    private function _getWorkingDql($workerId, $post_data)
    {
        $order_by = $post_data['orderby'];
        $asc = $post_data['orderasc'];
        //显示字段
        $field = "w.workId," .
            "w.workTitle," .
            "w.serverName," .
            "w.workPoints," .
            "w.workPriority," .
            "w.workStarttime," .
            "w.workEndtime," .
            "w.workJointime," .
            "w.workType";
        $where = "ww.workerId = $workerId";

        $dql = "SELECT $field FROM Admin\Entity\ShopncWorks w LEFT" .
            " JOIN Admin\Entity\ShopncWorksWorker ww WITH w.workId = ww.workId where $where" .
            " ORDER BY w.$order_by $asc ";
        return $dql;
    }

}