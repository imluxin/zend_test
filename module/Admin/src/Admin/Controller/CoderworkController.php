<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Admin\Entity\ShopncWorkGrab;
use Zend\View\Model\ViewModel;
use Admin\Form\CoderList\GrabForm;
use Admin\Filter\CoderList\GrabFilter;

class CoderworkController extends BaseController
{

    /**
     * 任务的详情
     * @return ViewModel
     */
    public function infoAction()
    {
        return new viewModel();
    }

    /**
     * 抢单的任务详情
     */
    public function grabAction()
    {
        //获取抢单ID
        $workId = $this->params()->fromRoute('id');
        //获取我的workerId
        $workerId = '1';
        //验证是否有此ID,并获取详细信息
        $work_info = $this->_verfiy_workID($workId);
        if (empty($work_info)) {
            //跳回原来的页面
            return $this->redirect()->
                toRoute('mygrab', array('status' => 'notfoundid'));
        }
        /*判断是否已经抢单，如果抢了就输出抢的信息*/
        $view = new viewModel();
        //post标记
        $flat_post = $this->getRequest()->isPost();
        //验证是否抢过单了
        $grab_data = $this->_verfig_grabed($workId, $workerId);

        if (!empty($grab_data)) {
            //标记已经抢过了
            $view->setVariable('workstatus', 'grabed');
            if ($flat_post) {
                $view->setVariable('error', '已经抢过了');
            }
        } else {
            // 没抢单,判断是否过期
            if (($work_info->getWorkJointime() > time()) && ($work_info->getWorkStatus() == '0')) {
                $view->setVariable('workstatus', 'grab');
                if ($flat_post) {
                    //枪单流程
                    if ($this->_grab_work($this->getRequest()->getPost(), $workId)) {

                        $view->setVariable('workstatus', 'grabed');
                        $view->setVariable('error', '抢单成功');
                    } else {
                        $view->setVariable('error', '抢单失败');
                    }
                }
            } else {
                $view->setVariable('workstatus', 'over');
                if ($flat_post) {
                    $view->setVariable('error', '已经过期了');
                }
            }
        }
        //输出一个表单
        $view->setVariable('form', new GrabForm());
        $view->setVariable('workgrab', $grab_data);
        $view->setVariable('workinfo', $work_info);
        return $view;
    }

    /**
     *  枪单
     * @param $workId
     * @return 抢单的信息
     */
    private function _grab_work($data, $workId)
    {

        $workform = new grabform();
        $workform->setInputFilter(new GrabFilter())
            ->setData($data);
        if (!$workform->isValid()) {
            return null;
        }
        /* instert database */
        //TOOD:需要员工的session

        try {
            $workgrap = new ShopncWorkGrab();
            $workgrap->setInsertTime(time())
                ->setWorkDays($data['day'])
                ->setWorkerId('2')
                ->setWorkId($workId)
                ->setWorkerName('员工名字')
                ->setWorkOther($data['other'])
                ->setWorkPoints($data['point']);
            $this->getEntityManager()->persist($workgrap);
            $this->getEntityManager()->flush();
            var_dump($workgrap);die();
            return $workgrap;

        } catch (\Exception $e) {

        }


    }


    /**
     * 判断是否我是否已经抢了单了
     */
    private function _verfig_grabed($workId, $workerId)
    {
        $result = $this
            ->getEntityManager()
            ->getRepository('Admin\Entity\ShopncWorkGrab')
            ->findOneBy(array('workId' => $workId, 'workerId' => $workerId));

        return $result;
    }

    /**
     * 验证是否有次ID
     * @param $workID
     * @return bool
     */
    private function _verfiy_workID($workId)
    {
        $result = $this
            ->getEntityManager()
            ->getRepository('Admin\Entity\ShopncWorks')
            ->findOneBy(array('workId' => $workId));
        //计算工期
        $result->workTime = $this->_computWorkTime($result->getWorkStartTime(), $result->getWorkEndTime());
        return $result;
    }

    /**
     *       计算工期
     * @param $start
     * @param $end
     * @return string
     */
    private function _computWorkTime($start, $end)
    {

        //计算天数
        $time = floor(($end - $start) / (60 * 60 * 24));
        if ($time < 1) {
            return floor(($end - $start) / (60 * 60)) . "&nbsp小时";
        }
        return $time . "&nbsp天";
    }
}