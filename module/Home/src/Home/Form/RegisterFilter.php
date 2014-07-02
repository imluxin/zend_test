<?php 
namespace Home\Form;

use Zend\InputFilter\InputFilter;
class RegisterFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
        	'name' => 'member_email',
            'required' => true,
            'validators' => array(
                array(
                	'name' => 'EmailAddress',
                    'options' => array('
                                domain'=>true,
                                )
                )	
            )
        ));
        
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
        
        $this->add(array(
        	'name' => 'confirm_pwd',
            'required' => true,
        ));
    }
}