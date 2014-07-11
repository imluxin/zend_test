<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Admin\model\WorkerChartModel;
use Zend\View\Model\ViewModel;


class IndexController extends BaseController
{
    public function indexAction()
    {
        $em = $this->getEntityManager();
        $model = new WorkerChartModel($em);
        $test = $model->getTheCharts('1');
        var_dump($test);

        return new ViewModel();
    }

    /**
     *员工欢迎页面
     */
    public function workerhubAction()
    {

    }

    /**
     *  server homepage
     */
    public function serverhubAction()
    {

    }




}
