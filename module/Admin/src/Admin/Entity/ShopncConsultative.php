<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncConsultative
 *
 * @ORM\Table(name="shopnc_consultative")
 * @ORM\Entity(repositoryClass="Admin\Repository\ShopncConsultativeRepository")
 */
class ShopncConsultative
{
    /**
     * @var integer
     *
     * @ORM\Column(name="active_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $activeId;

    /**
     * @var string
     *
     * @ORM\Column(name="active_title", type="string", length=200, nullable=false)
     */
    private $activeTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="class_id", type="integer", nullable=false)
     */
    private $classId;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="string", length=100, nullable=false)
     */
    private $className;

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
     * @var string
     *
     * @ORM\Column(name="active_content", type="text", nullable=false)
     */
    private $activeContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="insert_time", type="integer", nullable=false)
     */
    private $insertTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="handle_time", type="integer", nullable=true)
     */
    private $handleTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="complete_time", type="integer", nullable=true)
     */
    private $completeTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="close_time", type="integer", nullable=true)
     */
    private $closeTime;

    /**
     * @var string
     *
     * @ORM\Column(name="create_works", type="string", length=50, nullable=false)
     */
    private $createWorks = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="active_other", type="text", nullable=true)
     */
    private $activeOther;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=100, nullable=true)
     */
    private $website;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;


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
     * Set activeTitle
     *
     * @param string $activeTitle
     * @return ShopncConsultative
     */
    public function setActiveTitle($activeTitle)
    {
        $this->activeTitle = $activeTitle;

        return $this;
    }

    /**
     * Get activeTitle
     *
     * @return string 
     */
    public function getActiveTitle()
    {
        return $this->activeTitle;
    }

    /**
     * Set classId
     *
     * @param integer $classId
     * @return ShopncConsultative
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;

        return $this;
    }

    /**
     * Get classId
     *
     * @return integer 
     */
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * Set className
     *
     * @param string $className
     * @return ShopncConsultative
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     * @return ShopncConsultative
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
     * @return ShopncConsultative
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
     * Set activeContent
     *
     * @param string $activeContent
     * @return ShopncConsultative
     */
    public function setActiveContent($activeContent)
    {
        $this->activeContent = $activeContent;

        return $this;
    }

    /**
     * Get activeContent
     *
     * @return string 
     */
    public function getActiveContent()
    {
        return $this->activeContent;
    }

    /**
     * Set insertTime
     *
     * @param integer $insertTime
     * @return ShopncConsultative
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
     * Set status
     *
     * @param integer $status
     * @return ShopncConsultative
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

    /**
     * Set handleTime
     *
     * @param integer $handleTime
     * @return ShopncConsultative
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
     * Set completeTime
     *
     * @param integer $completeTime
     * @return ShopncConsultative
     */
    public function setCompleteTime($completeTime)
    {
        $this->completeTime = $completeTime;

        return $this;
    }

    /**
     * Get completeTime
     *
     * @return integer 
     */
    public function getCompleteTime()
    {
        return $this->completeTime;
    }

    /**
     * Set closeTime
     *
     * @param integer $closeTime
     * @return ShopncConsultative
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * Get closeTime
     *
     * @return integer 
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * Set createWorks
     *
     * @param string $createWorks
     * @return ShopncConsultative
     */
    public function setCreateWorks($createWorks)
    {
        $this->createWorks = $createWorks;

        return $this;
    }

    /**
     * Get createWorks
     *
     * @return string 
     */
    public function getCreateWorks()
    {
        return $this->createWorks;
    }

    /**
     * Set activeOther
     *
     * @param string $activeOther
     * @return ShopncConsultative
     */
    public function setActiveOther($activeOther)
    {
        $this->activeOther = $activeOther;

        return $this;
    }

    /**
     * Get activeOther
     *
     * @return string 
     */
    public function getActiveOther()
    {
        return $this->activeOther;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return ShopncConsultative
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return ShopncConsultative
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }


}
