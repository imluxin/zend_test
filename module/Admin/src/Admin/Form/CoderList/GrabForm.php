<?php

namespace Admin\Form\CoderList;

use Zend\Form\Form;

class GrabForm extends Form
{
    public function __construct($name = 'Working')
    {
        // we want to ignore the name passed
        parent::__construct($name);


        $this->setAttribute('method', 'post');
        $this->setAttribute('id', 'form_grab');
        $this->setAttribute('class', 'form-horizontal');
        $this->add(array(
            'name' => 'point',
            'type' => 'text',
        ));
        $this->add(array(
            'name' => 'day',
            'type' => 'text',
        ));
        $this->add(array(
            'name' => 'other',
            'type' => 'Textarea',
            'attributes' => array(
                'row' => '3',
            ),

        ));

    }
}