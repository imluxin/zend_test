<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorkerRule
 *
 * @ORM\Table(name="shopnc_worker_rule")
 * @ORM\Entity
 */
class ShopncWorkerRule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="wr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $wrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="wr_worker_id", type="integer", nullable=false)
     */
    private $wrWorkerId;

    /**
     * @var string
     *
     * @ORM\Column(name="wr_title", type="text", nullable=false)
     */
    private $wrTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="wr_content", type="text", nullable=false)
     */
    private $wrContent;

    /**
     * @var string
     *
     * @ORM\Column(name="wr_table_columns", type="text", nullable=false)
     */
    private $wrTableColumns;

    /**
     * @var string
     *
     * @ORM\Column(name="wr_order_by", type="string", length=50, nullable=false)
     */
    private $wrOrderBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="wr_asc", type="integer", nullable=false)
     */
    private $wrAsc = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="wr_page", type="integer", nullable=false)
     */
    private $wrPage = '15';

    /**
     * @var integer
     *
     * @ORM\Column(name="wr_mod_time", type="integer", nullable=true)
     */
    private $wrModTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="wr_act", type="integer", nullable=false)
     */
    private $wrAct = '0';


    /**
     * Get wrId
     *
     * @return integer 
     */
    public function getWrId()
    {
        return $this->wrId;
    }

    /**
     * Set wrWorkerId
     *
     * @param integer $wrWorkerId
     * @return ShopncWorkerRule
     */
    public function setWrWorkerId($wrWorkerId)
    {
        $this->wrWorkerId = $wrWorkerId;

        return $this;
    }

    /**
     * Get wrWorkerId
     *
     * @return integer 
     */
    public function getWrWorkerId()
    {
        return $this->wrWorkerId;
    }

    /**
     * Set wrTitle
     *
     * @param string $wrTitle
     * @return ShopncWorkerRule
     */
    public function setWrTitle($wrTitle)
    {
        $this->wrTitle = $wrTitle;

        return $this;
    }

    /**
     * Get wrTitle
     *
     * @return string 
     */
    public function getWrTitle()
    {
        return $this->wrTitle;
    }

    /**
     * Set wrContent
     *
     * @param string $wrContent
     * @return ShopncWorkerRule
     */
    public function setWrContent($wrContent)
    {
        $this->wrContent = $wrContent;

        return $this;
    }

    /**
     * Get wrContent
     *
     * @return string 
     */
    public function getWrContent()
    {
        return $this->wrContent;
    }

    /**
     * Set wrTableColumns
     *
     * @param string $wrTableColumns
     * @return ShopncWorkerRule
     */
    public function setWrTableColumns($wrTableColumns)
    {
        $this->wrTableColumns = $wrTableColumns;

        return $this;
    }

    /**
     * Get wrTableColumns
     *
     * @return string 
     */
    public function getWrTableColumns()
    {
        return $this->wrTableColumns;
    }

    /**
     * Set wrOrderBy
     *
     * @param string $wrOrderBy
     * @return ShopncWorkerRule
     */
    public function setWrOrderBy($wrOrderBy)
    {
        $this->wrOrderBy = $wrOrderBy;

        return $this;
    }

    /**
     * Get wrOrderBy
     *
     * @return string 
     */
    public function getWrOrderBy()
    {
        return $this->wrOrderBy;
    }

    /**
     * Set wrAsc
     *
     * @param integer $wrAsc
     * @return ShopncWorkerRule
     */
    public function setWrAsc($wrAsc)
    {
        $this->wrAsc = $wrAsc;

        return $this;
    }

    /**
     * Get wrAsc
     *
     * @return integer 
     */
    public function getWrAsc()
    {
        return $this->wrAsc;
    }

    /**
     * Set wrPage
     *
     * @param integer $wrPage
     * @return ShopncWorkerRule
     */
    public function setWrPage($wrPage)
    {
        $this->wrPage = $wrPage;

        return $this;
    }

    /**
     * Get wrPage
     *
     * @return integer 
     */
    public function getWrPage()
    {
        return $this->wrPage;
    }

    /**
     * Set wrModTime
     *
     * @param integer $wrModTime
     * @return ShopncWorkerRule
     */
    public function setWrModTime($wrModTime)
    {
        $this->wrModTime = $wrModTime;

        return $this;
    }

    /**
     * Get wrModTime
     *
     * @return integer 
     */
    public function getWrModTime()
    {
        return $this->wrModTime;
    }

    /**
     * Set wrAct
     *
     * @param integer $wrAct
     * @return ShopncWorkerRule
     */
    public function setWrAct($wrAct)
    {
        $this->wrAct = $wrAct;

        return $this;
    }

    /**
     * Get wrAct
     *
     * @return integer 
     */
    public function getWrAct()
    {
        return $this->wrAct;
    }


}
