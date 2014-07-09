<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorker
 *
 * @ORM\Table(name="shopnc_worker")
 * @ORM\Entity
 */
class ShopncWorker
{
    /**
     * @var integer
     *
     * @ORM\Column(name="worker_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $workerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", length=11, nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_realname", type="string", length=255, nullable=false)
     */
    private $workerRealname;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_nickname", type="string", length=255, nullable=true)
     */
    private $workerNickname;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_avatar", type="string", length=255, nullable=true)
     */
    private $workerAvatar;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_phone", type="string", length=255, nullable=true)
     */
    private $workerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="woker_qq", type="string", length=255, nullable=true)
     */
    private $wokerQq;

    /**
     * @var integer
     *
     * @ORM\Column(name="jion_time", type="integer", nullable=false)
     */
    private $jionTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_time", type="integer", nullable=false)
     */
    private $lastTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_num", type="integer", nullable=false)
     */
    private $loginNum = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="worker_points", type="float", precision=10, scale=0, nullable=false)
     */
    private $workerPoints = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="complete_works", type="float", precision=10, scale=0, nullable=false)
     */
    private $completeWorks = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="worker_type", type="float", precision=10, scale=0, nullable=false)
     */
    private $workerType = '1';

    /**
     * @var float
     *
     * @ORM\Column(name="worker_email", type="float", precision=10, scale=0, nullable=false)
     */
    private $workerEmail;

    /**
     * @var float
     *
     * @ORM\Column(name="group_id", type="float", precision=10, scale=0, nullable=false)
     */
    private $groupId = '1';

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array()) {
        foreach ( $data as $key => $val ) {
            if (property_exists ( $this, $key )) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
    }
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() {
        return get_object_vars ( $this );
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

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set workerRealname
     *
     * @param string $workerRealname
     * @return ShopncWorker
     */
    public function setWorkerRealname($workerRealname)
    {
        $this->workerRealname = $workerRealname;

        return $this;
    }

    /**
     * Get workerRealname
     *
     * @return string 
     */
    public function getWorkerRealname()
    {
        return $this->workerRealname;
    }

    /**
     * Set workerNickname
     *
     * @param string $workerNickname
     * @return ShopncWorker
     */
    public function setWorkerNickname($workerNickname)
    {
        $this->workerNickname = $workerNickname;

        return $this;
    }

    /**
     * Get workerNickname
     *
     * @return string 
     */
    public function getWorkerNickname()
    {
        return $this->workerNickname;
    }

    /**
     * Set workerAvatar
     *
     * @param string $workerAvatar
     * @return ShopncWorker
     */
    public function setWorkerAvatar($workerAvatar)
    {
        $this->workerAvatar = $workerAvatar;

        return $this;
    }

    /**
     * Get workerAvatar
     *
     * @return string 
     */
    public function getWorkerAvatar()
    {
        return $this->workerAvatar;
    }

    /**
     * Set workerPhone
     *
     * @param string $workerPhone
     * @return ShopncWorker
     */
    public function setWorkerPhone($workerPhone)
    {
        $this->workerPhone = $workerPhone;

        return $this;
    }

    /**
     * Get workerPhone
     *
     * @return string 
     */
    public function getWorkerPhone()
    {
        return $this->workerPhone;
    }

    /**
     * Set wokerQq
     *
     * @param string $wokerQq
     * @return ShopncWorker
     */
    public function setWokerQq($wokerQq)
    {
        $this->wokerQq = $wokerQq;

        return $this;
    }

    /**
     * Get wokerQq
     *
     * @return string 
     */
    public function getWokerQq()
    {
        return $this->wokerQq;
    }

    /**
     * Set jionTime
     *
     * @param integer $jionTime
     * @return ShopncWorker
     */
    public function setJionTime($jionTime)
    {
        $this->jionTime = $jionTime;

        return $this;
    }

    /**
     * Get jionTime
     *
     * @return integer 
     */
    public function getJionTime()
    {
        return $this->jionTime;
    }

    /**
     * Set lastTime
     *
     * @param integer $lastTime
     * @return ShopncWorker
     */
    public function setLastTime($lastTime)
    {
        $this->lastTime = $lastTime;

        return $this;
    }

    /**
     * Get lastTime
     *
     * @return integer 
     */
    public function getLastTime()
    {
        return $this->lastTime;
    }

    /**
     * Set loginNum
     *
     * @param integer $loginNum
     * @return ShopncWorker
     */
    public function setLoginNum($loginNum)
    {
        $this->loginNum = $loginNum;

        return $this;
    }

    /**
     * Get loginNum
     *
     * @return integer 
     */
    public function getLoginNum()
    {
        return $this->loginNum;
    }

    /**
     * Set workerPoints
     *
     * @param float $workerPoints
     * @return ShopncWorker
     */
    public function setWorkerPoints($workerPoints)
    {
        $this->workerPoints = $workerPoints;

        return $this;
    }

    /**
     * Get workerPoints
     *
     * @return float 
     */
    public function getWorkerPoints()
    {
        return $this->workerPoints;
    }

    /**
     * Set completeWorks
     *
     * @param float $completeWorks
     * @return ShopncWorker
     */
    public function setCompleteWorks($completeWorks)
    {
        $this->completeWorks = $completeWorks;

        return $this;
    }

    /**
     * Get completeWorks
     *
     * @return float 
     */
    public function getCompleteWorks()
    {
        return $this->completeWorks;
    }

    /**
     * Set workerType
     *
     * @param float $workerType
     * @return ShopncWorker
     */
    public function setWorkerType($workerType)
    {
        $this->workerType = $workerType;

        return $this;
    }

    /**
     * Get workerType
     *
     * @return float 
     */
    public function getWorkerType()
    {
        return $this->workerType;
    }

    /**
     * Set workerEmail
     *
     * @param float $workerEmail
     * @return ShopncWorker
     */
    public function setWorkerEmail($workerEmail)
    {
        $this->workerEmail = $workerEmail;

        return $this;
    }

    /**
     * Get workerEmail
     *
     * @return float 
     */
    public function getWorkerEmail()
    {
        return $this->workerEmail;
    }

    /**
     * Set groupId
     *
     * @param float $groupId
     * @return ShopncWorker
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return float 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

}
