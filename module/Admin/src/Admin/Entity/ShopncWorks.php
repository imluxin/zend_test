<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorks
 *
 * @ORM\Table(name="shopnc_works")
 * @ORM\Entity
 */
class ShopncWorks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="work_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $workId;

    /**
     * @var string
     *
     * @ORM\Column(name="work_title", type="string", length=200, nullable=false)
     */
    private $workTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="work_content", type="text", nullable=false)
     */
    private $workContent;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_other", type="text", nullable=true)
     */
    private $workerOther;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_create_time", type="integer", nullable=false)
     */
    private $workCreateTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="active_id", type="integer", nullable=true)
     */
    private $activeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="member_name", type="string", length=50, nullable=false)
     */
    private $memberName;

    /**
     * @var integer
     *
     * @ORM\Column(name="server_id", type="integer", nullable=false)
     */
    private $serverId;

    /**
     * @var string
     *
     * @ORM\Column(name="server_name", type="string", length=50, nullable=false)
     */
    private $serverName;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_type", type="integer", nullable=true)
     */
    private $workType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="work_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $workPoints = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_priority", type="integer", nullable=true)
     */
    private $workPriority = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_status", type="integer", nullable=true)
     */
    private $workStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_starttime", type="integer", nullable=false)
     */
    private $workStarttime;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_endtime", type="integer", nullable=false)
     */
    private $workEndtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_jointime", type="integer", nullable=true)
     */
    private $workJointime;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_points", type="integer", nullable=true)
     */
    private $typePoints = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="direct_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $directPoints = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="dec_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $decPoints = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="zero_points", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $zeroPoints = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="work_pasttime", type="integer", nullable=true)
     */
    private $workPasttime;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_overtime", type="integer", nullable=true)
     */
    private $workOvertime;

    /**
     * @var string
     *
     * @ORM\Column(name="work_worker", type="text", nullable=true)
     */
    private $workWorker;


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
     * Set workTitle
     *
     * @param string $workTitle
     * @return ShopncWorks
     */
    public function setWorkTitle($workTitle)
    {
        $this->workTitle = $workTitle;

        return $this;
    }

    /**
     * Get workTitle
     *
     * @return string 
     */
    public function getWorkTitle()
    {
        return $this->workTitle;
    }

    /**
     * Set workContent
     *
     * @param string $workContent
     * @return ShopncWorks
     */
    public function setWorkContent($workContent)
    {
        $this->workContent = $workContent;

        return $this;
    }

    /**
     * Get workContent
     *
     * @return string 
     */
    public function getWorkContent()
    {
        return $this->workContent;
    }

    /**
     * Set workerOther
     *
     * @param string $workerOther
     * @return ShopncWorks
     */
    public function setWorkerOther($workerOther)
    {
        $this->workerOther = $workerOther;

        return $this;
    }

    /**
     * Get workerOther
     *
     * @return string 
     */
    public function getWorkerOther()
    {
        return $this->workerOther;
    }

    /**
     * Set workCreateTime
     *
     * @param integer $workCreateTime
     * @return ShopncWorks
     */
    public function setWorkCreateTime($workCreateTime)
    {
        $this->workCreateTime = $workCreateTime;

        return $this;
    }

    /**
     * Get workCreateTime
     *
     * @return integer 
     */
    public function getWorkCreateTime()
    {
        return $this->workCreateTime;
    }

    /**
     * Set activeId
     *
     * @param integer $activeId
     * @return ShopncWorks
     */
    public function setActiveId($activeId)
    {
        $this->activeId = $activeId;

        return $this;
    }

    /**
     * Get activeId
     *
     * @return integer 
     */
    public function getActiveId()
    {
        return $this->activeId;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     * @return ShopncWorks
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer 
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set memberName
     *
     * @param string $memberName
     * @return ShopncWorks
     */
    public function setMemberName($memberName)
    {
        $this->memberName = $memberName;

        return $this;
    }

    /**
     * Get memberName
     *
     * @return string 
     */
    public function getMemberName()
    {
        return $this->memberName;
    }

    /**
     * Set serverId
     *
     * @param integer $serverId
     * @return ShopncWorks
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;

        return $this;
    }

    /**
     * Get serverId
     *
     * @return integer 
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * Set serverName
     *
     * @param string $serverName
     * @return ShopncWorks
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;

        return $this;
    }

    /**
     * Get serverName
     *
     * @return string 
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * Set workType
     *
     * @param integer $workType
     * @return ShopncWorks
     */
    public function setWorkType($workType)
    {
        $this->workType = $workType;

        return $this;
    }

    /**
     * Get workType
     *
     * @return integer 
     */
    public function getWorkType()
    {
        return $this->workType;
    }

    /**
     * Set workPoints
     *
     * @param string $workPoints
     * @return ShopncWorks
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
     * Set workPriority
     *
     * @param integer $workPriority
     * @return ShopncWorks
     */
    public function setWorkPriority($workPriority)
    {
        $this->workPriority = $workPriority;

        return $this;
    }

    /**
     * Get workPriority
     *
     * @return integer 
     */
    public function getWorkPriority()
    {
        return $this->workPriority;
    }

    /**
     * Set workStatus
     *
     * @param integer $workStatus
     * @return ShopncWorks
     */
    public function setWorkStatus($workStatus)
    {
        $this->workStatus = $workStatus;

        return $this;
    }

    /**
     * Get workStatus
     *
     * @return integer 
     */
    public function getWorkStatus()
    {
        return $this->workStatus;
    }

    /**
     * Set workStarttime
     *
     * @param integer $workStarttime
     * @return ShopncWorks
     */
    public function setWorkStarttime($workStarttime)
    {
        $this->workStarttime = $workStarttime;

        return $this;
    }

    /**
     * Get workStarttime
     *
     * @return integer 
     */
    public function getWorkStarttime()
    {
        return $this->workStarttime;
    }

    /**
     * Set workEndtime
     *
     * @param integer $workEndtime
     * @return ShopncWorks
     */
    public function setWorkEndtime($workEndtime)
    {
        $this->workEndtime = $workEndtime;

        return $this;
    }

    /**
     * Get workEndtime
     *
     * @return integer 
     */
    public function getWorkEndtime()
    {
        return $this->workEndtime;
    }

    /**
     * Set workJointime
     *
     * @param integer $workJointime
     * @return ShopncWorks
     */
    public function setWorkJointime($workJointime)
    {
        $this->workJointime = $workJointime;

        return $this;
    }

    /**
     * Get workJointime
     *
     * @return integer 
     */
    public function getWorkJointime()
    {
        return $this->workJointime;
    }

    /**
     * Set typePoints
     *
     * @param integer $typePoints
     * @return ShopncWorks
     */
    public function setTypePoints($typePoints)
    {
        $this->typePoints = $typePoints;

        return $this;
    }

    /**
     * Get typePoints
     *
     * @return integer 
     */
    public function getTypePoints()
    {
        return $this->typePoints;
    }

    /**
     * Set directPoints
     *
     * @param string $directPoints
     * @return ShopncWorks
     */
    public function setDirectPoints($directPoints)
    {
        $this->directPoints = $directPoints;

        return $this;
    }

    /**
     * Get directPoints
     *
     * @return string 
     */
    public function getDirectPoints()
    {
        return $this->directPoints;
    }

    /**
     * Set decPoints
     *
     * @param string $decPoints
     * @return ShopncWorks
     */
    public function setDecPoints($decPoints)
    {
        $this->decPoints = $decPoints;

        return $this;
    }

    /**
     * Get decPoints
     *
     * @return string 
     */
    public function getDecPoints()
    {
        return $this->decPoints;
    }

    /**
     * Set zeroPoints
     *
     * @param string $zeroPoints
     * @return ShopncWorks
     */
    public function setZeroPoints($zeroPoints)
    {
        $this->zeroPoints = $zeroPoints;

        return $this;
    }

    /**
     * Get zeroPoints
     *
     * @return string 
     */
    public function getZeroPoints()
    {
        return $this->zeroPoints;
    }

    /**
     * Set workPasttime
     *
     * @param integer $workPasttime
     * @return ShopncWorks
     */
    public function setWorkPasttime($workPasttime)
    {
        $this->workPasttime = $workPasttime;

        return $this;
    }

    /**
     * Get workPasttime
     *
     * @return integer 
     */
    public function getWorkPasttime()
    {
        return $this->workPasttime;
    }

    /**
     * Set workOvertime
     *
     * @param integer $workOvertime
     * @return ShopncWorks
     */
    public function setWorkOvertime($workOvertime)
    {
        $this->workOvertime = $workOvertime;

        return $this;
    }

    /**
     * Get workOvertime
     *
     * @return integer 
     */
    public function getWorkOvertime()
    {
        return $this->workOvertime;
    }

    /**
     * Set workWorker
     *
     * @param string $workWorker
     * @return ShopncWorks
     */
    public function setWorkWorker($workWorker)
    {
        $this->workWorker = $workWorker;

        return $this;
    }

    /**
     * Get workWorker
     *
     * @return string 
     */
    public function getWorkWorker()
    {
        return $this->workWorker;
    }


}
