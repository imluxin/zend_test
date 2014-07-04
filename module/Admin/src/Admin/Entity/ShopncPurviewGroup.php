<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncPurviewGroup
 *
 * @ORM\Table(name="shopnc_purview_group")
 * @ORM\Entity
 */
class ShopncPurviewGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=255, nullable=false)
     */
    private $groupName;

    /**
     * @var string
     *
     * @ORM\Column(name="group_purview", type="text", nullable=false)
     */
    private $groupPurview;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_edit", type="boolean", nullable=false)
     */
    private $isEdit;

    /**
     * @var string
     *
     * @ORM\Column(name="group_discript", type="text", nullable=true)
     */
    private $groupDiscript;

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
    }


    /**
     * Get groupId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set groupName
     *
     * @param string $groupName
     * @return ShopncPurviewGroup
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string 
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Set groupPurview
     *
     * @param string $groupPurview
     * @return ShopncPurviewGroup
     */
    public function setGroupPurview($groupPurview)
    {
        $this->groupPurview = $groupPurview;

        return $this;
    }

    /**
     * Get groupPurview
     *
     * @return string 
     */
    public function getGroupPurview()
    {
        return $this->groupPurview;
    }

    /**
     * Set isEdit
     *
     * @param boolean $isEdit
     * @return ShopncPurviewGroup
     */
    public function setIsEdit($isEdit)
    {
        $this->isEdit = $isEdit;

        return $this;
    }

    /**
     * Get isEdit
     *
     * @return boolean 
     */
    public function getIsEdit()
    {
        return $this->isEdit;
    }

    /**
     * Set groupDiscript
     *
     * @param string $groupDiscript
     * @return ShopncPurviewGroup
     */
    public function setGroupDiscript($groupDiscript)
    {
        $this->groupDiscript = $groupDiscript;

        return $this;
    }

    /**
     * Get groupDiscript
     *
     * @return string 
     */
    public function getGroupDiscript()
    {
        return $this->groupDiscript;
    }

}
