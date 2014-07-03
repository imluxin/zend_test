<?php 
namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="shopnc_purview_group")
 */
class PurviewGroup implements InputFilterAwareInterface
{
    protected $inputFilter;
 
    /**
     * @ORM\Id
     * @ORM\Column(name="group_id", type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="group_name", type="string", nullable=false)
     */
    protected $group_name;
    
    /**
     * @ORM\Column(name="group_purview", type="text", nullable=false)
     */
    protected $group_purview;
    
    /**
     * @ORM\Column(name="is_edit", type="boolean", nullable=false)
     */
    protected $is_edit;
    
    /**
     * @ORM\Column(name="group_discript", type="text", nullable=true)
     */
    protected $group_discript;
    
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
//         $this->group_id = $data['group_id'];
//         $this->group_name = $data['group_name'];
//         $this->group_purview = $data['group_purview'];
//         $this->is_edit = $data['is_edit'];
//         $this->group_discript = $data['group_discript'];
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
                    'name' => 'id',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'Int')
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'name',
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
                                            'max' => 100,
                                    )
                            )
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'purview',
                    'required' => true,
                    'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    )
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'is_edit',
                    'required' => true
            )));
             
            $inputFilter->add($factory->createInput(array(
                    'name' => 'description',
                    'required' => false
            )));
             
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    
}
