<?php

namespace Admin\Form\CoderList;

use Zend\Form\Form;

class WorkingForm extends Form
{
    public function __construct($name = 'Working')
    {
        // we want to ignore the name passed
        parent::__construct($name);

        $this->setAttribute('method', 'get');
        $this->setAttribute('class', 'form-inline');
        $this->add(array(
            'name' => 'orderby',
            'type' => 'select',
            'options' => array(
                'value_options' => array(
                    'workPriority' => '优先级',
                    'workPoints' => '任务奖励积分',
                    'workStarttime' => '任务开始时间',
                    'workEndtime' => '任务结束时间',
                    'workType' => '任务类型',
                ),
            )
        ));
        $this->add(array(
            'name' => 'orderasc',
            'type' => 'select',
            'options' => array(
                'value_options' => array(
                    'ASC' => '升序',
                    'DESC' => '降序'
                ),
            )
        ));

//        $this->add(array(
//                'name' => '',
//                'attributes' => array(
//                    'value' => '登录',
//                    'class' => 'btn',
//                    'type' => 'Submit'
//                )
//            )
//        );
    }
}