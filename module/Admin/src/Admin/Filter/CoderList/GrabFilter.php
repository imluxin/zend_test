<?php

namespace Admin\Filter\CoderList;

use Zend\InputFilter\InputFilter;

class GrabFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'point',
            'required' => true,
            'validators' => array(
                array(
                    'name'    => 'Digits',
                ),
                array(
                    'name'=>'not_empty'
                )
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));

        $this->add(array(
                'name' => 'day',
                'required' => true,
                'validators' => array(
                    array(
                        'name'    => 'Digits',
                    ),
                    array(
                        'name'=>'not_empty'
                    )
                ),
                'filters'   => array(
                    array('name' => 'StringTrim'),
                ),
            )
        );
        $this->add(array(
                'name' => 'other',
                'required' => false,
                'filters'   => array(
                    array('name' => 'StringTrim'),
                ),
            )
        );
    }
}