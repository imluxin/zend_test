<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncPointsLog
 *
 * @ORM\Table(name="shopnc_points_log")
 * @ORM\Entity
 */
class ShopncPointsLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="worker_id", type="integer", nullable=false)
     */
    private $workerId;

    /**
     * @var string
     *
     * @ORM\Column(name="points_num", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $pointsNum = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="insert_time", type="integer", nullable=false)
     */
    private $insertTime;

    /**
     * @var string
     *
     * @ORM\Column(name="points_type", type="string", length=50, nullable=false)
     */
    private $pointsType = 'inc';

    /**
     * @var string
     *
     * @ORM\Column(name="change_info", type="text", nullable=true)
     */
    private $changeInfo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set workerId
     *
     * @param integer $workerId
     * @return ShopncPointsLog
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;

        return $this;
    }

    /**
     * Get workerId
     *
     * @return integer 
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * Set pointsNum
     *
     * @param string $pointsNum
     * @return ShopncPointsLog
     */
    public function setPointsNum($pointsNum)
    {
        $this->pointsNum = $pointsNum;

        return $this;
    }

    /**
     * Get pointsNum
     *
     * @return string 
     */
    public function getPointsNum()
    {
        return $this->pointsNum;
    }

    /**
     * Set insertTime
     *
     * @param integer $insertTime
     * @return ShopncPointsLog
     */
    public function setInsertTime($insertTime)
    {
        $this->insertTime = $insertTime;

        return $this;
    }

    /**
     * Get insertTime
     *
     * @return integer 
     */
    public function getInsertTime()
    {
        return $this->insertTime;
    }

    /**
     * Set pointsType
     *
     * @param string $pointsType
     * @return ShopncPointsLog
     */
    public function setPointsType($pointsType)
    {
        $this->pointsType = $pointsType;

        return $this;
    }

    /**
     * Get pointsType
     *
     * @return string 
     */
    public function getPointsType()
    {
        return $this->pointsType;
    }

    /**
     * Set changeInfo
     *
     * @param string $changeInfo
     * @return ShopncPointsLog
     */
    public function setChangeInfo($changeInfo)
    {
        $this->changeInfo = $changeInfo;

        return $this;
    }

    /**
     * Get changeInfo
     *
     * @return string 
     */
    public function getChangeInfo()
    {
        return $this->changeInfo;
    }


}
