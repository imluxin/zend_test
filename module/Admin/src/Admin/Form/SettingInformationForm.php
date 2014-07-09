<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-7
 * Time: 上午9:48
 */
namespace Admin\Form;

use Zend\Form\Form;

class SettingInformationForm extends Form
{
    public function __construct($name = 'worker',$workerList)
    {
        parent::__construct ( $name );
        $workerId = $workerList['workerId'];
        $workerName = $workerList['workerName'];
        $workerRealname = $workerList['workerRealname'];
        $workerNickname = $workerList['workerNickname'];
        $workerPhone = $workerList['workerPhone'];
        $wokerQq = $workerList['wokerQq'];
        $workerEmail = $workerList['workerEmail'];
        $this->setAttribute ( 'method', 'post' );
        $this->add ( array (
            'name' => 'workerId',
            'attributes' => array (
                'type' => 'text',
                'value'=>$workerId,
            ),
        ) );
        $this->add ( array (
            'name' => 'workerName',
            'attributes' => array (
                'type' => 'text',
                'value'=>$workerName,
                'required' => 'required'
            ),
            'options' => array (
                'label' => '员工名'
            )
        ) );
        $this->add ( array (
            'name' => 'workerRealname',
            'attributes' => array (
                'type' => 'text',
                'value'=>$workerRealname,
                'required' => 'required'
            ),
            'options' => array (
                'label' => '员工真实姓名'
            )
        ) );
        $this->add ( array (
            'name' => 'workerNickname',
            'attributes' => array (
                'type' => 'text',
                'value'=>$workerNickname,
            ),
            'options' => array (
                'label' => '员工昵称'
            )
        ) );
        $this->add ( array (
            'name' => 'workerPhone',
            'attributes' => array (
                'type' => 'text',
                'value'=>$workerPhone,
                'required' => 'required'
            ),
            'options' => array (
                'label' => '员工电话'
            )
        ) );
        $this->add ( array (
            'name' => 'wokerQq',
            'attributes' => array (
                'type' => 'text',
                'value'=>$wokerQq,
                'required' => 'required'
            ),
            'options' => array (
                'label' => '员工QQ'
            )
        ) );
        $this->add ( array (
            'name' => 'workerEmail',
            'attributes' => array (
                'type' => 'email',
                'value'=>$workerEmail,
                'required' => 'required'
            ),
            'options' => array (
                'label' => '员工Email'
            )
        ) );
        $this->add ( array (
            'name' => 'submit',
            'attributes' => array (
                'value' => '提交',
                'class' => 'pnc',
                'type' => 'Submit'
            )
        ) );
    }
}