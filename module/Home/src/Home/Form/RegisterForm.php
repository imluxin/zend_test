<?php
namespace Home\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Register');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        $this->add(array(
        	'name' => 'member_name',
            'attributes' => array(
                'type' => 'text',
                'required' => 'required'
            ),
            'options' => array(
                'label' => '用户名'
            )
        ));
        
        $this->add(array(
        	'name' => 'member_email',
            'attributes' => array(
                'type' => 'email',
                'required' => 'required'
            ),
            'options' => array(
                'label' => '电子邮箱'	
            ),
            'filters' => array(
                array('name'=>'StringTrim'),	
            ),
            'validators' => array(
            	array(
                    'name' => 'member_email',
            	    'options' => array(
                                	'message' => array(\Zend\Validator\EmailAddress::INVALID_FORMAT => '电子邮件格式错误')
                                )	
                )
            )
        ));
        
        $this->add(array(
        	'name' => 'member_pwd',
            'attributes' => array(
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array(
                'label' => '登陆密码'
            )
        ));
        
        $this->add(array(
        	'name' => 'confirm_pwd',
            'attributes' => array(
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array(
                'label' => '确认密码'
            )
        ));
        
        $this->add(array(
        	'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => '注册',
                'id' => 'submit'
            ),
        ));
    }
}