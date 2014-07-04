<?php
namespace Admin\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * A music album.
 *
 * @ORM\Entity
 * @ORM\Table(name="shopnc_works_log")
 *
 * @property string $artist
 * @property string $title
 * @property int $id
 */
class WorkLog
{

    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $log_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $log_content;

    /**
     * @ORM\Column(type="integer")
     */
    protected $log_user;

    /**
     * @ORM\Column(type="string")
     */
    protected $log_user_type;

    /**
     * @ORM\Column(type="integer")
     */
    protected $log_time;

    /**
     * @ORM\Column(type="integer")
     */
    protected $log_work_id;

    /**
     * Populate from an array.
     *
     * @param array $data            
     */
    public function populate ($data = array())
    {
        // $this->log_id = $data['log_id'];
        // $this->log_content = $data['log_content'];
        // $this->log_user = $data['log_user'];
        // $this->log_user_type = $data['log_user_type'];
        // $this->log_time = $data['log_time'];
        // $this->log_work_id = $data['log_work_id'];
        // $this->log_work_id = $data['log_work_id'];
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
    }
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy ()
    {
        return get_object_vars($this);
    }
}