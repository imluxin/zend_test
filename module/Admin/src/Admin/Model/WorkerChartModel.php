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
    private $dql = 'SELECT {select} FROM Admin\Entity\ShopncWorksWorker a LEFT JOIN Admin\Entity\ShopncWorks b WITH a.workId = b.workId where {where}';

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * 获得排行版，和自己的排行
     * @param $workerId
     * @param string $type
     * @return array|null
     */
    public function getTheCharts($workerId, $type = "month")
    {
        /* 查找所有员工的id */
        $all_worker_info = $this->getAllWorkerInfo();
        if (empty($all_worker_info)) {
            return null;
        }
        //获取所有员工的时间段积分
        $points_chart = array();
        foreach ($all_worker_info as $key => $val) {
            //根据iD 获取员工积分
            $tmp_point_chart = $this->getPointsChart($val['workerId'], $type);
            if (is_array($tmp_point_chart) && !empty($tmp_point_chart)) {
                $tmp_point = end($tmp_point_chart)['points'];

            } else {
                $tmp_point = 0.00;
            }
            $points_chart[$val['workerId']]['point'] = $tmp_point;
            $all_worker_info[$key]['point'] = $tmp_point;
            $all_worker_info[$key] = array_reverse($all_worker_info[$key]);
        }
        //将 points_chart 排序
        arsort($all_worker_info);
        arsort($points_chart);
        return array(
            'Theharts' => $all_worker_info,
            'myTheCharts' => array_flip(array_keys($points_chart))[$workerId] + 1
        );
    }

    /**
     * 获得本月的积分详情
     * @param $workerId
     * @param string $type
     * @return array|string
     */
    public function  getPointsChart($workerId, $type = 'month')
    {
        $field = "a.pointsNum,a.pointsType,a.insertTime";
        //获取时间段
        $time_series = $this->_getUnixTime($type);
        //装填dql
        $dql = "SELECT {$field} FROM Admin\Entity\ShopncPointsLog a WHERE a.workerId = {$workerId} and (a.insertTime BETWEEN {$time_series[0]} AND {$time_series[1]})";
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();
        //判断是否为空
        if (empty($result)) {
            return '0';
        }
        //循环运算
        $point = 0.00;
        foreach ($result as $key => $value) {
            if ($value['pointsType'] == 'inc') {
                $point += $value['pointsNum'];
                $result[$key]['pointsNum'] = $value['pointsNum'];
            }
            if ($value['pointsType'] == 'dec') {
                $point -= $value['pointsNum'];
                $result[$key]['pointsNum'] = '-' . $value['pointsNum'];
            }
            $result[$key]['points'] = $point;
        }
        return ($result);
    }

    /**
     * 根据时间段获取工作数量
     * @param $workerID
     * @param string $type
     * @return int
     */
    public function getWorkCountByTime($workerID, $type = "month")
    {
        $field = 'a.workerId';
        $where = '(a.workerId = ' . $workerID . ') and (b.workStatus = 4) and ';
        /* 取得时段 */
        $timeSeries = $this->_getUnixTime($type);
        $where .= "(b.workEndtime BETWEEN {$timeSeries[0]} AND {$timeSeries[1]})";
        $query = $this->em->createQuery($this->_getDql($field, $where));
        $result_data = $query->getResult();
        return count($result_data);
    }

    /**
     *  获取员工的本月或者是本周的工作时间
     * @param $worker_id
     * @param string $type
     * @return array datebase
     */
    public function getWorkerTime($worker_id, $type = 'month')
    {
        /* 查找员工完成的任务 */
        $field = 'b.workStarttime,b.workEndtime,a.workFinishTime';
        $where = 'a.workerId = ' . $worker_id;
        $query = $this->em->createQuery($this->_getDql($field, $where));
        $data = $query->getResult();
        if (empty($works_list) && !is_array($data)) {
            return '0';
        }
        /* 变换结束时间 */
        $data = $this->_reloadEndTime($data);

        /* 获取时间unix */
        $times_unix = $this->_getUnixTime($type);

        /* 根据规则计算工作时间 */
        return $this->_computeWorkerTime($times_unix, $data);
    }


    private function getAllWorkerInfo()
    {
        $field = "a.workerId,a.workerRealname";
        $dql = "SELECT {$field} FROM Admin\Entity\ShopncWorker a WHERE a.workerType=2";
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }

    /**
     * 获得一条dql 语句
     * @param $select
     * @param $where
     * @return mixed
     */
    private function _getDql($select, $where)
    {
        $dql = str_replace('{select}', $select, $this->dql);
        $dql = str_replace('{where}', $where, $dql);
        return $dql;
    }

    /**
     * 如果工作有最终结束时间就重新确定一下结束时间
     * @param $data
     * @return mixed
     */
    private function  _reloadEndTime($data)
    {
        foreach ($data as $key => $val) {
            if (!empty($val['workFinishTime'])) {
                $data[$key]['workEndtime'] = $val['workFinishTime'];
            }
        }
        return $data;
    }

    /**
     * 根据类型来获取unix时间段
     * @param $type
     * @return array
     */
    private function _getUnixTime($type)
    {
        $time_now = array();
        /* 获取当月时间 */
        switch ($type) {
            case 'day':
                $time_now = $this->_getNowDay();
                break;
            case 'week':
                $time_now = $this->_getNowWeek();
                break;
            case 'month':
                $time_now = $this->_getNowMonth();
                break;
            default:
                break;
        }
        return $time_now;
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

    private function _getNowWeek()
    {
        $start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"));
        return array($start, $end);
    }

    /*
     * 获取指定日期所在星期的开始时间与结束时间的时间戳
     * param mx $date 参数形式如：2013-01-15 或者 1358179200 也可以为空
     * return array('begintime','endtime')
     */

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

    /**
     * 计算工作时间
     * @param $date_times
     * @param $work_times
     * @return int
     */
    private function _computeWorkerTime($date_times, $work_times)
    {
        $_work_time = 0;
        foreach ($work_times as $key => $value) {
            //时间在前面
            if ($value['workStarttime'] <= $date_times[0] &&
                $value['workStarttime'] <= $date_times[1] &&
                $value['workEndtime'] >= $date_times[0] &&
                $value['workEndtime'] <= $date_times[1]
            ) {
                $_work_time += $value['workEndtime'] - $date_times[0];
            } //时间在当中
            elseif ($value['workStarttime'] >= $date_times[0] &&
                $value['workStarttime'] <= $date_times[1] &&
                $value['workEndtime'] >= $date_times[0] &&
                $value['workEndtime'] <= $date_times[1]
            ) {
                $_work_time += $value['workEndtime'] - $value['workStarttime'];
            } //时间在后面
            elseif ($value['workStarttime'] >= $date_times[0] &&
                $value['workStarttime'] <= $date_times[1] &&
                $value['workEndtime'] >= $date_times[0] &&
                $value['workEndtime'] >= $date_times[1]
            ) {
                $_work_time += $date_times[1] - $value['workStarttime'];
            }
        }
        return ceil($_work_time / 3600);


    }

}