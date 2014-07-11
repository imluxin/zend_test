<?php
namespace User\Form;

use Zend\Form\Form;

class ProfileForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('profile');
                
        $this->add(array(
        		'name' => 'memberEmail',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '电子邮箱',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberTelphone',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '固定电话',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberPhone',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '移动电话',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberQq',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'QQ',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberMsn',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Msn',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberAddress',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '详细地址',
        		)
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => '提交',
                'id' => 'submitbutton',
            )
        ));
    }
}