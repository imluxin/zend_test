<?php 
namespace Admin\Filter;

use Zend\InputFilter\InputFilter;

class ShopncCustomerFilter extends InputFilter
{
    public function __construct()
    {   
        $this->add(array(
                'name' => 'member_id',
                'required' => true,
                'filters' => array(
                        array('name' => 'Int')
                )
        ));
         
        $this->add(array(
                'name' => 'member_name',
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
                'name' => 'member_pwd',
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
                'name' => 'member_name',
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
        
    }
}