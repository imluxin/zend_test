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


}
