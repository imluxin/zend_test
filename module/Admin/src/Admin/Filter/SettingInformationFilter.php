<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-7
 * Time: 下午8:43
 */
namespace Admin\Filter;
use Zend\InputFilter\InputFilter;

class SettingInformationFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'workerName',
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
        ));
        $this->add(array(
            'name' => 'workerRealname',
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
        ));
        $this->add(array(
            'name' => 'workerPhone',
            'filters' => array (
                array (
                    'name' => 'Int'
                )
            ),
        ));
        $this->add(array(
            'name' => 'workerEmail',
            'required' => true,
        ));
        $this->add(array(
            'name' => 'wokerQq',
            'filters' => array(
                array('name' => 'Int')
            )
        ));
    }
}