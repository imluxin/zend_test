<?php
/**
 * Created by PhpStorm.
 * User: chijing
 * Date: 14-7-8
 * Time: 下午5:42
 */
namespace Admin\Model;

use Doctrine\ORM\EntityManager;

/**
 *
 * lass WorkerChartModel
 * @package Admin\Model
 * yong用于显示各种员工的统计
 */
class WorkerChartModel
{
    private $em;
    /**
     * use dql array
     * @var array
     */
    private $dql = array(
        'getWorkerTime' => 'SELECT works,worker FROM worker LEFT JOIN works b WITH works.email = b.email',


    );

    public function __construct(EntityManager $em)
    {
        // TODO: Implement __construct() method.
        $this->em = $em;
    }

    /**
     *  get worker time by 'type' and 'worker_id'
     * @param $worker_id
     * @param string $type
     */
    public function getWorkerTime($worker_id, $type = 'month')
    {
        /* 查找员工完成的任务 */
        $worker = 'Admin\Entity\ShopncWorksWorker';
        $works = 'Admin\Entity\ShopncWorks';
        $get_work_time ='SELECT a.workerId,b.workContent FROM '. $worker.' a LEFT JOIN '.$works.' b WITH a.workId = b.workId';
        $query = $this->em->createQuery($get_work_time);
        $query = $query->getResult();
        return $query;
//        'getWorkerTime' => 'SELECT works,worker FROM worker LEFT JOIN works b WITH works.email = b.email';
    }

    /**
     * get start time and end time form now day
     * @return array
     */
    private function _getNowDay()
    {
        $start = mktime(0, 0, 0, date("m"), date("m"), date("Y")); //当天开始时间戳
        $end = mktime(23, 59, 59, date("m"), date("m"), date("Y")); //当天结束时间戳
        // return $start . ','.$end;
        return array($start, $end);
    }

    /*
     * 获取指定日期所在星期的开始时间与结束时间的时间戳
     * param mx $date 参数形式如：2013-01-15 或者 1358179200 也可以为空
     * return array('begintime','endtime')
     */

    private function _getNowWeek()
    {
        $start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"));
        return array($start, $end);
    }

    /**
     * get start time and end time from now month
     * @return array
     */
    private function _getNowMonth()
    {
        $t = time();
        $start = mktime(0, 0, 0, date("m", $t), 1, date("Y", $t));
        $end = mktime(0, 0, 0, date("m", $t) + 1, 1, date("Y", $t));
        // return $start . ','. $end;
        return array($start, $end);
    }

}