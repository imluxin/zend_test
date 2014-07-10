<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-9
 * Time: 下午6:46
 */
namespace Admin\Controller;

use Home\Controller\BaseController;

class ActiveController extends BaseController
{
    /*
     * 未处理咨询列表
     * */
    public function untreatedActiveListAction(){
        $request = $this->getRequest();
        if($request->isGet()){
            $pageNumberOld = $request->getQuery()->page;
        }
        $maxlist = 2;
        $dql = "SELECT sm FROM Admin\Entity\ShopncMessage sm WHERE sm.msgTo = 1 ORDER BY sm.insertTime DESC ";
        $vm = $this->fenye($dql,$maxlist,$pageNumberOld);
        return $vm;
    }
}