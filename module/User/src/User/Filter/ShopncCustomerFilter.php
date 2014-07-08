<?php 
namespace User\Filter;

use Zend\InputFilter\InputFilter;

class ShopncCustomerFilter extends InputFilter
{
    public function __construct()
    {   
        $this->add(array(
                'name' => 'memberId',
                'required' => true,
                'filters' => array(
                        array('name' => 'Int')
                )
        ));
         
        $this->add(array(
                'name' => 'memberName',
                'required' => true,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                ),
                'validators' => array(
                        array(
                                'name' => 'StringLength',
                                'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 1,
                                        'max' => 50,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'memberPwd',
                'required' => true,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                ),
                'validators' => array(
                        array(
                                'name' => 'StringLength',
                                'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 6,
                                        'max' => 20,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'realName',
                'required' => true,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                ),
                'validators' => array(
                        array(
                                'name' => 'StringLength',
                                'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 1,
                                        'max' => 50,
                                )
                        )
                )
        ));
        
        $this->add(array(
        	'name' => 'memberEmail',
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
        
    }
}