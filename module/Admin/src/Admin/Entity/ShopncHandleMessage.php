<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncHandleMessage
 *
 * @ORM\Table(name="shopnc_handle_message")
 * @ORM\Entity
 */
class ShopncHandleMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="handle_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $handleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="active_id", type="integer", nullable=false)
     */
    private $activeId;

    /**
     * @var string
     *
     * @ORM\Column(name="handle_content", type="text", nullable=false)
     */
    private $handleContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="handle_time", type="integer", nullable=false)
     */
    private $handleTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=50, nullable=false)
     */
    private $userType;

    /**
     * @var string
     *
     * @ORM\Column(name="handle_other", type="text", nullable=true)
     */
    private $handleOther;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;


    /**
     * Get handleId
     *
     * @return integer 
     */
    public function getHandleId()
    {
        return $this->handleId;
    }

    /**
     * Set activeId
     *
     * @param integer $activeId
     * @return ShopncHandleMessage
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
     * Set handleContent
     *
     * @param string $handleContent
     * @return ShopncHandleMessage
     */
    public function setHandleContent($handleContent)
    {
        $this->handleContent = $handleContent;

        return $this;
    }

    /**
     * Get handleContent
     *
     * @return string 
     */
    public function getHandleContent()
    {
        return $this->handleContent;
    }

    /**
     * Set handleTime
     *
     * @param integer $handleTime
     * @return ShopncHandleMessage
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
     * Set userId
     *
     * @param integer $userId
     * @return ShopncHandleMessage
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
     * Set userType
     *
     * @param string $userType
     * @return ShopncHandleMessage
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string 
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set handleOther
     *
     * @param string $handleOther
     * @return ShopncHandleMessage
     */
    public function setHandleOther($handleOther)
    {
        $this->handleOther = $handleOther;

        return $this;
    }

    /**
     * Get handleOther
     *
     * @return string 
     */
    public function getHandleOther()
    {
        return $this->handleOther;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ShopncHandleMessage
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }


}
