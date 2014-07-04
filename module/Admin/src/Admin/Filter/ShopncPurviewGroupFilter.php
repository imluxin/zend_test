<?php 
namespace Admin\Filter;

use Zend\InputFilter\InputFilter;

class ShopncPurviewGroupFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                        array('name' => 'Int')
                )
        ));
         
        $this->add(array(
                'name' => 'name',
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
                                        'max' => 100,
                                )
                        )
                )
        ));
         
        $this->add(array(
                'name' => 'purview',
                'required' => true,
                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                )
        ));
         
        $this->add(array(
                'name' => 'is_edit',
                'required' => true
        ));
         
        $this->add(array(
                'name' => 'description',
                'required' => false
        ));
        
    }
}