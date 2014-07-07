<?php
namespace Admin\Form;

use Zend\Form\Form;

class CustomerForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('customer');
        
        $this->add(array(
            'name' => 'memberId',
            'type' => 'Hidden'
        ));
        
        $this->add(array(
            'name' => 'memberName',
            'type' => 'Text',
            'options' => array(
                'label' => '会员名称',
            )
        ));
        
        $this->add(array(
            'name' => 'memberPwd',
            'type' => 'Text',
            'options' => array(
                'label' => '密码',
            )
        ));
        
        /*$this->add(array(
        		'name' => 'repwd',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '确认密码',
        		)
        ));*/
        
        $this->add(array(
        		'name' => 'realName',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '公司/个人名称',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberEmail',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '电子邮箱',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberTelphone',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '手机号',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberQq',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'QQ',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberWebsite',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '网站',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberAddress',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '详细地址',
        		)
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            )
        ));
    }
}