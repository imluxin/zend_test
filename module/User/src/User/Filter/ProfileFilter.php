<?php 
namespace User\Filter;

use Zend\InputFilter\InputFilter;

class ProfileFilter extends InputFilter
{
    public function __construct()
    {        
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
         
        $this->add(array(
                'name' => 'memberTelphone',
                'required' => false,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                ),
                'validators' => array(
                        array(
                                'name' => 'StringLength',
                                'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 7,
                                        'max' => 11,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'memberPhone',
                'required' => true,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                ),
                'validators' => array(
                        array('name' => 'Int'),
                        array(
                                'name' => 'StringLength',
                                'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 11,
                                        'max' => 11,
                                )
                        )
                )
        ));
                  
        $this->add(array(
                'name' => 'memberQq',
                'required' => false,
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
                                        'max' => 100,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'memberMsn',
                'required' => false,
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
                                        'max' => 100,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'memberAddress',
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
                                )
                        )
                )
        ));
        
    }
}