<?php
namespace Admin\Form;

use Zend\Form\Form;

class ProductForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('product_form');
        $this->add(array(
        		'name' => 'proId',
        		'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'proName',
            'type' => 'Text',
            'attributes'=>array(
            	'id'=>'pro_name',
            	'class' => 'text w200',
        	),
        ));

        $this->add(array(
        		'type' => 'Radio',
        		'name' => 'isShow',
        		'options' => array(
        				'value_options' => array(
        						'0' => '否',
        						'1' => '是',
        				),
        		)
        ));

        $this->add(array(
            'name' => 'sort',
            'type' => 'Text',
        	'attributes'=>array(
        		'id'=>'sort',
        		'class' => '"text w50',
        		'value'=>'0',
        	),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => '提交',
                'class' => 'btn btn-primary',
            )
        ));
    }
}