<?php

namespace Admin\Form;

use Zend\InputFilter\InputFilter;

class LoginFilter extends InputFilter {
	public function __construct() {
		$this->add ( array (
				'name' => 'worker_name',
				'required' => true,
				'filters' => array (
						array (
								'name' => 'StripTags' 
						) 
				),
				'validators' => array (
						array (
								'name' => 'StringLength',
								'options' => array (
										'encoding' => 'UTF-8',
										'min' => 2,
										'max' => 20 
								) 
						) 
				) 
		) );
		
		$this->add ( array (
				'name' => 'worker_pwd',
				'required' => true,
				'validators' => array(
						array(
								'name'=>'NotEmpty',
								'options' => array(
										'message' => array(\Zend\Validator\NotEmpty::IS_EMPTY => '不能为空')
// 										'message'=>"22222"
								)
						)
				)
				
				
				
				
				 
		) );
	}
}