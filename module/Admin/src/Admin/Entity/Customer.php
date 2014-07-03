<?php 
namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="shopnc_customer")
 */
class Customer implements InputFilterAwareInterface
{
    protected $inputFilter;
 
    /**
     * @ORM\Id
     * @ORM\Column(name="member_id", type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="member_name", type="string", nullable=false)
     */
    protected $member_name;
    
    /**
     * @ORM\Column(name="member_pwd", type="string", nullable=false)
     */
    protected $member_pwd;
    
    /**
     * @ORM\Column(name="member_avatar", type="string", nullable=true)
     */
    protected $member_avatar;
    
    /**
     * @ORM\Column(name="member_qq", type="string", nullable=true)
     */
    protected $member_qq;
    
    /**
     * @ORM\Column(name="member_website", type="string", nullable=true)
     */
    protected $member_website;
    
    /**
     * @ORM\Column(name="member_email", type="string", nullable=true)
     */
    protected $member_email;
    
    /**
     * @ORM\Column(name="member_telphone", type="string", nullable=true)
     */
    protected $member_telphone;
    
    /**
     * @ORM\Column(name="real_name", type="string", nullable=true)
     */
    protected $real_name;
    
    /**
     * @ORM\Column(name="member_time", type="string", nullable=true)
     */
    protected $member_time;
    
    /**
     * @ORM\Column(name="member_login_num", type="integer", nullable=true)
     */
    protected $member_login_num;
    
    /**
     * @ORM\Column(name="member_last_login", type="string", nullable=true)
     */
    protected $member_last_login;
    
    /**
     * @ORM\Column(name="member_address", type="string", nullable=true)
     */
    protected $member_address;
    
    /**
     * @ORM\Column(name="authorize", type="integer", nullable=true)
     */
    protected $authorize;
    
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }
    
    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
//         $this->member_id = $data['member_id'];
//         $this->member_name = $data['member_name'];
//         $this->member_pwd = $data['member_pwd'];
//         $this->member_avatar = $data['member_avatar'];
//         $this->member_phone = $data['member_phone'];
//         $this->member_qq = $data['member_qq'];
//         $this->member_website = $data['member_website'];
//         $this->member_email = $data['member_email'];
//         $this->member_telphone = $data['member_telphone'];
//         $this->real_name = $data['member_email'];
//         $this->member_time = $data['member_time'];
//         $this->member_login_num = $data['member_login_num'];
//         $this->member_last_login = $data['member_last_login'];
//         $this->member_address = $data['member_address'];
//         $this->authorize = $data['authorize'];
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Not used');
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'member_id',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'Int')
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'member_name',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                            array(
                                    'name' => 'StringLength',
                                    'options' => array(
                                            'encoding' => 'UTF-8',
                                            'min' => 1,
                                            'max' => 50,
                                    )
                            )
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'member_pwd',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                            array(
                                    'name' => 'StringLength',
                                    'options' => array(
                                            'encoding' => 'UTF-8',
                                            'min' => 6,
                                            'max' => 20,
                                    )
                            )
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'member_name',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                            array(
                                    'name' => 'StringLength',
                                    'options' => array(
                                            'encoding' => 'UTF-8',
                                            'min' => 1,
                                            'max' => 50,
                                    )
                            )
                    )
            )));
            
            $inputFilter->add($factory->createInput(array(
            	'name' => 'member_email',
                'required' => true,
                'validators' => array(
                    array(
                    	'name' => 'EmailAddress',
                        'options' => array('
                                    domain'=>true,
                                    )
                    )	
                )
            )));
             
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    
}
