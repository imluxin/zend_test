<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncAuthorizeLog
 *
 * @ORM\Table(name="shopnc_authorize_log")
 * @ORM\Entity
 */
class ShopncAuthorizeLog
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
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="handle_type", type="string", length=50, nullable=false)
     */
    private $handleType;

    /**
     * @var integer
     *
     * @ORM\Column(name="handle_time", type="integer", nullable=false)
     */
    private $handleTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

    /**
     * @var integer
     *
     * @ORM\Column(name="auth_id", type="integer", nullable=false)
     */
    private $authId;


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
     * Set userId
     *
     * @param integer $userId
     * @return ShopncAuthorizeLog
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set handleType
     *
     * @param string $handleType
     * @return ShopncAuthorizeLog
     */
    public function setHandleType($handleType)
    {
        $this->handleType = $handleType;

        return $this;
    }

    /**
     * Get handleType
     *
     * @return string 
     */
    public function getHandleType()
    {
        return $this->handleType;
    }

    /**
     * Set handleTime
     *
     * @param integer $handleTime
     * @return ShopncAuthorizeLog
     */
    public function setHandleTime($handleTime)
    {
        $this->handleTime = $handleTime;

        return $this;
    }

    /**
     * Get handleTime
     *
     * @return integer 
     */
    public function getHandleTime()
    {
        return $this->handleTime;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     * @return ShopncAuthorizeLog
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
     * Set authId
     *
     * @param integer $authId
     * @return ShopncAuthorizeLog
     */
    public function setAuthId($authId)
    {
        $this->authId = $authId;

        return $this;
    }

    /**
     * Get authId
     *
     * @return integer 
     */
    public function getAuthId()
    {
        return $this->authId;
    }


}
