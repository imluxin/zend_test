<?php

namespace Admin\Form;

use Zend\Form\Form;

class LoginForm extends Form {
	public function __construct($name = 'Worker') {
		// we want to ignore the name passed
		parent::__construct ( $name );
		
		$this->setAttribute ( 'method', 'post' );
		
		$this->add ( array (
				'name' => 'worker_name',
				'type' => 'Text',
				'attributes' => array (
						'class' => "pt pt_password",
						'placeholder' => "用户名",
						
				)
				 
		) );
		$this->add ( array (
				'name' => 'worker_pwd',
				'type' => 'password',
				'attributes' => array (
						'class' => "pt pt_password",
						'placeholder' => "密码",
						
				) 
		) );
		$this->add ( array (
				'name' => 'submit',
				'attributes' => array (
						'value' => '登录',
						'class' => 'pnc',
						'type' => 'Submit' 
				) 
		) );
	}
}