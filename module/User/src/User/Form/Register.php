<?php

namespace User\Form;

use Zend\Form\Element\Captcha as Captcha;
use ZfcUser\Options\RegistrationOptionsInterface;
use User\Entity\User;

class Register extends Base
{
    protected $captchaElement= null;

    /**
     * @var RegistrationOptionsInterface
     */
    protected $registrationOptions;

    /**
     * @param string|null $name
     * @param RegistrationOptionsInterface $options
     */
    public function __construct($name, RegistrationOptionsInterface $options)
    {
        $this->setRegistrationOptions($options);
        parent::__construct($name);

        $this->remove('userId');
        if (!$this->getRegistrationOptions()->getEnableUsername()) {
            $this->remove('username');
        }
        if (!$this->getRegistrationOptions()->getEnableDisplayName()) {
            $this->remove('display_name');
        }

        // 增加type项
        $this->add(array(
                'name' => 'type',
                'type' => 'Zend\Form\Element\Hidden',
                'attributes' => array(
                        'value' => '3',
                ),
                'options' => array(
                        'label' => '用户类型',
                )
        ));
        
        $this->add(array(
        		'name' => 'realName',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '公司/个人名称',
        		)
        ));
        
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
        				'label' => '手机号',
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
        		'name' => 'memberWebsite',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '网站',
        		)
        ));
        
        $this->add(array(
        		'name' => 'memberAddress',
        		'type' => 'Text',
        		'options' => array(
        				'label' => '详细地址',
        		)
        ));
        
        if ($this->getRegistrationOptions()->getUseRegistrationFormCaptcha() && $this->captchaElement) {
            $this->add($this->captchaElement, array('name'=>'captcha'));
        }
        
        $this->get('submit')->setLabel('注册');
        $this->getEventManager()->trigger('init', $this);
    }

    public function setCaptchaElement(Captcha $captchaElement)
    {
        $this->captchaElement= $captchaElement;
    }

    /**
     * Set Registration Options
     *
     * @param RegistrationOptionsInterface $registrationOptions
     * @return Register
     */
    public function setRegistrationOptions(RegistrationOptionsInterface $registrationOptions)
    {
        $this->registrationOptions = $registrationOptions;
        return $this;
    }

    /**
     * Get Registration Options
     *
     * @return RegistrationOptionsInterface
     */
    public function getRegistrationOptions()
    {
        return $this->registrationOptions;
    }
}
