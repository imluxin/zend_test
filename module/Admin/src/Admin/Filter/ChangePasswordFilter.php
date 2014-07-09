<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-7
 * Time: 上午9:57
 */
namespace Admin\Filter;
use Zend\InputFilter\InputFilter;

class ChangePasswordFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'old_password',
            'required' => true,
            'filters' => array(
                array('name' => 'Int')
            )
        ));
        $this->add(array(
            'name' => 'new_password',
            'required' => true,
            'filters' => array(
                array('name' => 'Int')
            )
        ));
        $this->add(array(
            'name' => 'confirm_password',
            'required' => true,
            'filters' => array(
                array('name' => 'Int')
            )
        ));
    }
}