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
//        $dql = 'SELECT u FROM Admin\Entity\ShopncWorker u WHERE u.workerName = 27583939';
//        $query = $em->createQuery($dql);
//        $users = $query->getResult();
        $model = new WorkerChartModel($em);
        $test = $model->getWorkerTime('1');

//        foreach($test as $key){
//            \Doctrine\Common\Util\Debug::dump($key);
//            echo '<br>';
//        }



        return new ViewModel();
    }

    private function _get()
    {

    }

}
