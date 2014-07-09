<?php
/**
 * Created by PhpStorm.
 * User: szq
 * Date: 14-7-7
 * Time: 上午9:48
 */
namespace Admin\Form;

use Zend\Form\Form;

class ChangePasswordForm extends Form
{
    public function __construct($name = 'worker')
    {
        parent::__construct ( $name );

        $this->setAttribute ( 'method', 'post' );
        $this->add ( array (
            'name' => 'old_password',
            'attributes' => array (
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array (
                'label' => '原始密码'
            )
        ) );
        $this->add ( array (
            'name' => 'new_password',
            'attributes' => array (
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array (
                'label' => '新密码'
            )
        ) );
        $this->add ( array (
            'name' => 'confirm_password',
            'attributes' => array (
                'type' => 'password',
                'required' => 'required'
            ),
            'options' => array (
                'label' => '确认密码'
            )
        ) );
        $this->add ( array (
            'name' => 'submit',
            'attributes' => array (
                'value' => '提交',
                'class' => 'pnc',
                'type' => 'Submit'
            )
        ) );
    }
}