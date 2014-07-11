<?php

namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;
use Zend\Captcha\Image;

class Base extends ProvidesEventsForm
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'username',
            'options' => array(
                'label' => '用户名',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => '邮箱',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'display_name',
            'options' => array(
                'label' => '昵称',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'options' => array(
                'label' => '登陆密码',
            ),
            'attributes' => array(
                'type' => 'password',
                'id'   => 'password'
            ),
        ));

        $this->add(array(
            'name' => 'passwordVerify',
            'options' => array(
                'label' => '确认密码',
            ),
            'attributes' => array(
                'type' => 'password',
            ),
        ));

        if ($this->getRegistrationOptions()->getUseRegistrationFormCaptcha()) {
            $captcha_image = new Image(array(
            	'font' => './public/captcha/font/4.ttf',
                'imgDir' => 'public/captcha/images/',
                'imgUrl' => '/captcha/images/',
                'dotNoiseLevel' => 0,
                'lineNoiseLevel' => 0,
                'width' => 100,
                'height' => 30,
                'fsize' => 16,
                'wordLen' => 4,
            ));
            $this->add(array(
                'name' => 'captcha',
                'type' => 'Zend\Form\Element\Captcha',
                'options' => array(
                    'label' => '验证码',
                    'captcha' => $captcha_image,//$this->getRegistrationOptions()->getFormCaptchaOptions(),
                ),
                'attributes' => array(
                	'maxlength' => '4'
                )
            ));
        }

        $submitElement = new Element\Button('submit');
        $submitElement
            ->setLabel('Submit')
            ->setAttributes(array(
                'type'  => 'submit',
            ));

        $this->add($submitElement, array(
            'priority' => -100,
        ));

        $this->add(array(
            'name' => 'userId',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'type' => 'hidden'
            ),
        ));

        // @TODO: Fix this... getValidator() is a protected method.
        //$csrf = new Element\Csrf('csrf');
        //$csrf->getValidator()->setTimeout($this->getRegistrationOptions()->getUserFormTimeout());
        //$this->add($csrf);
    }
}
