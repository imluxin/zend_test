<?php 
namespace Home\Form;

use Zend\InputFilter\InputFilter;
class LoginFilter extends InputFilter
{
    public function __construct()
    {
        
        $this->add(array(
        	'name' => 'member_name',
            'required' => true,
            'filters' => array(
            	array(
                    'name' => 'StripTags',	
                )
            ),
            'validators' => array(
                array(
                	'name' => 'StringLength',
                    'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 2,
                            'max' => 20
                        )
                )	
            )
        ));
        
        $this->add(array(
        	'name' => 'member_pwd',
            'required' => true,
        ));
        
    }
}