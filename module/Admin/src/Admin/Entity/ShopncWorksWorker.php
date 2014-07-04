<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorksWorker
 *
 * @ORM\Table(name="shopnc_works_worker")
 * @ORM\Entity
 */
class ShopncWorksWorker
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ww_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $wwId;

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
     * @var boolean
     *
     * @ORM\Column(name="is_leader", type="boolean", nullable=false)
     */
    private $isLeader = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="work_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $workPoints = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_progress", type="integer", nullable=true)
     */
    private $workProgress = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_finish_time", type="integer", nullable=true)
     */
    private $workFinishTime;


    /**
     * Get wwId
     *
     * @return integer 
     */
    public function getWwId()
    {
        return $this->wwId;
    }

    /**
     * Set workId
     *
     * @param integer $workId
     * @return ShopncWorksWorker
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
     * @return ShopncWorksWorker
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
     * @return ShopncWorksWorker
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
     * Set isLeader
     *
     * @param boolean $isLeader
     * @return ShopncWorksWorker
     */
    public function setIsLeader($isLeader)
    {
        $this->isLeader = $isLeader;

        return $this;
    }

    /**
     * Get isLeader
     *
     * @return boolean 
     */
    public function getIsLeader()
    {
        return $this->isLeader;
    }

    /**
     * Set workPoints
     *
     * @param string $workPoints
     * @return ShopncWorksWorker
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
     * Set workProgress
     *
     * @param integer $workProgress
     * @return ShopncWorksWorker
     */
    public function setWorkProgress($workProgress)
    {
        $this->workProgress = $workProgress;

        return $this;
    }

    /**
     * Get workProgress
     *
     * @return integer 
     */
    public function getWorkProgress()
    {
        return $this->workProgress;
    }

    /**
     * Set workFinishTime
     *
     * @param integer $workFinishTime
     * @return ShopncWorksWorker
     */
    public function setWorkFinishTime($workFinishTime)
    {
        $this->workFinishTime = $workFinishTime;

        return $this;
    }

    /**
     * Get workFinishTime
     *
     * @return integer 
     */
    public function getWorkFinishTime()
    {
        return $this->workFinishTime;
    }


}
