<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncConsultativeLog
 *
 * @ORM\Table(name="shopnc_consultative_log")
 * @ORM\Entity
 */
class ShopncConsultativeLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="log_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logId;

    /**
     * @var string
     *
     * @ORM\Column(name="log_content", type="text", nullable=false)
     */
    private $logContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_user", type="integer", nullable=false)
     */
    private $logUser = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="log_user_type", type="string", length=50, nullable=false)
     */
    private $logUserType;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_time", type="integer", nullable=false)
     */
    private $logTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="active_id", type="integer", nullable=false)
     */
    private $activeId;


    /**
     * Get logId
     *
     * @return integer 
     */
    public function getLogId()
    {
        return $this->logId;
    }

    /**
     * Set logContent
     *
     * @param string $logContent
     * @return ShopncConsultativeLog
     */
    public function setLogContent($logContent)
    {
        $this->logContent = $logContent;

        return $this;
    }

    /**
     * Get logContent
     *
     * @return string 
     */
    public function getLogContent()
    {
        return $this->logContent;
    }

    /**
     * Set logUser
     *
     * @param integer $logUser
     * @return ShopncConsultativeLog
     */
    public function setLogUser($logUser)
    {
        $this->logUser = $logUser;

        return $this;
    }

    /**
     * Get logUser
     *
     * @return integer 
     */
    public function getLogUser()
    {
        return $this->logUser;
    }

    /**
     * Set logUserType
     *
     * @param string $logUserType
     * @return ShopncConsultativeLog
     */
    public function setLogUserType($logUserType)
    {
        $this->logUserType = $logUserType;

        return $this;
    }

    /**
     * Get logUserType
     *
     * @return string 
     */
    public function getLogUserType()
    {
        return $this->logUserType;
    }

    /**
     * Set logTime
     *
     * @param integer $logTime
     * @return ShopncConsultativeLog
     */
    public function setLogTime($logTime)
    {
        $this->logTime = $logTime;

        return $this;
    }

    /**
     * Get logTime
     *
     * @return integer 
     */
    public function getLogTime()
    {
        return $this->logTime;
    }

    /**
     * Set activeId
     *
     * @param integer $activeId
     * @return ShopncConsultativeLog
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


}
