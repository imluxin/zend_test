<?php

namespace Home\Form;

use Zend\Form\Form;

class LoginForm extends Form {
	public function __construct($name = null) {
		parent::__construct ( 'Login' );
		$this->setAttribute ( 'method', 'post' );
		
		$this->add ( array (
				'name' => 'member_name',
				'attributes' => array (
						'type' => 'text',
						'required' => 'required' 
				),
				'options' => array (
						'label' => '用户名' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'member_pwd',
				'attributes' => array (
						'type' => 'password',
						'required' => 'required' 
				),
				'options' => array (
						'label' => '登陆密码' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'submit',
				'type' => 'submit',
				'attributes' => array (
						
						'value' => '登陆',
						'id' => 'submit' 
				) 
		) );
	}
}