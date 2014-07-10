<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncProduct
 *
 * @ORM\Table(name="shopnc_product")
 * @ORM\Entity
 */
class ShopncProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pro_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proId;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_name", type="string", length=100, nullable=false)
     */
    private $proName;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_show", type="integer", nullable=false)
     */
    private $isShow = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort = '0';

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
   // public function getArrayCopy()
    //{
    	//return get_object_vars($this);
    //}
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    /* public function populate($data = array())
    {
    	foreach ($data as $key => $val) {
    		if (property_exists($this, $key)) {
    			$this->$key = ($val !== null) ? $val : null;
    		}
    	}
    } */

    /**
     * Get proId
     *
     * @return integer
     */
    public function getProId()
    {
        return $this->proId;
    }

    /**
     * Set proName
     *
     * @param string $proName
     * @return ShopncProduct
     */
    public function setProName($proName)
    {
        $this->proName = $proName;

        return $this;
    }

    /**
     * Get proName
     *
     * @return string
     */
    public function getProName()
    {
        return $this->proName;
    }

    /**
     * Set isShow
     *
     * @param integer $isShow
     * @return ShopncProduct
     */
    public function setIsShow($isShow)
    {
        $this->isShow = $isShow;

        return $this;
    }

    /**
     * Get isShow
     *
     * @return integer
     */
    public function getIsShow()
    {
        return $this->isShow;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return ShopncProduct
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }

    public function populate($data = array())
    {
    	foreach ($data as $key => $val) {
    		if (property_exists($this, $key)) {
    			$this->$key = ($val !== null) ? $val : null;
    		}
    	}
    }

}
