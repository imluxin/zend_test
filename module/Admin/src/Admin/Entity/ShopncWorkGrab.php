<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorkGrab
 *
 * @ORM\Table(name="shopnc_work_grab")
 * @ORM\Entity
 */
class ShopncWorkGrab
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grab_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grabId;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_id", type="integer", nullable=false)
     */
    private $workId;

    /**
     * @var integer
     *
     * @ORM\Column(name="worker_id", type="integer", nullable=false)
     */
    private $workerId;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_name", type="string", length=50, nullable=false)
     */
    private $workerName;

    /**
     * @var string
     *
     * @ORM\Column(name="work_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $workPoints = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="work_days", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $workDays = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="insert_time", type="integer", nullable=false)
     */
    private $insertTime;

    /**
     * @var string
     *
     * @ORM\Column(name="work_other", type="text", nullable=true)
     */
    private $workOther;


    /**
     * Get grabId
     *
     * @return integer 
     */
    public function getGrabId()
    {
        return $this->grabId;
    }

    /**
     * Set workId
     *
     * @param integer $workId
     * @return ShopncWorkGrab
     */
    public function setWorkId($workId)
    {
        $this->workId = $workId;

        return $this;
    }

    /**
     * Get workId
     *
     * @return integer 
     */
    public function getWorkId()
    {
        return $this->workId;
    }

    /**
     * Set workerId
     *
     * @param integer $workerId
     * @return ShopncWorkGrab
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
     * Set workerName
     *
     * @param string $workerName
     * @return ShopncWorkGrab
     */
    public function setWorkerName($workerName)
    {
        $this->workerName = $workerName;

        return $this;
    }

    /**
     * Get workerName
     *
     * @return string 
     */
    public function getWorkerName()
    {
        return $this->workerName;
    }

    /**
     * Set workPoints
     *
     * @param string $workPoints
     * @return ShopncWorkGrab
     */
    public function setWorkPoints($workPoints)
    {
        $this->workPoints = $workPoints;

        return $this;
    }

    /**
     * Get workPoints
     *
     * @return string 
     */
    public function getWorkPoints()
    {
        return $this->workPoints;
    }

    /**
     * Set workDays
     *
     * @param string $workDays
     * @return ShopncWorkGrab
     */
    public function setWorkDays($workDays)
    {
        $this->workDays = $workDays;

        return $this;
    }

    /**
     * Get workDays
     *
     * @return string 
     */
    public function getWorkDays()
    {
        return $this->workDays;
    }

    /**
     * Set insertTime
     *
     * @param integer $insertTime
     * @return ShopncWorkGrab
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
     * Set workOther
     *
     * @param string $workOther
     * @return ShopncWorkGrab
     */
    public function setWorkOther($workOther)
    {
        $this->workOther = $workOther;

        return $this;
    }

    /**
     * Get workOther
     *
     * @return string 
     */
    public function getWorkOther()
    {
        return $this->workOther;
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


}
