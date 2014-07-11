<?php

namespace Admin\Filter\CoderList;

use Zend\InputFilter\InputFilter;

class WorkingFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'orderby',
            'required' => false
        ));

        $this->add(array(
                'name' => 'orderasc',
                'required' => false,
            )
        );
    }
}