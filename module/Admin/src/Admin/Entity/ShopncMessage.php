<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncMessage
 *
 * @ORM\Table(name="shopnc_message")
 * @ORM\Entity
 */
class ShopncMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="msg_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $msgId;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_content", type="text", nullable=false)
     */
    private $msgContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="insert_time", type="integer", nullable=false)
     */
    private $insertTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_read", type="integer", nullable=false)
     */
    private $isRead = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="read_time", type="integer", nullable=true)
     */
    private $readTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_type", type="integer", nullable=false)
     */
    private $msgType = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_from", type="integer", nullable=false)
     */
    private $msgFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_fromname", type="string", length=50, nullable=false)
     */
    private $msgFromname;

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_frome_type", type="integer", nullable=true)
     */
    private $msgFromeType;

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_to", type="integer", nullable=false)
     */
    private $msgTo;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_toname", type="string", length=50, nullable=false)
     */
    private $msgToname;

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_to_type", type="integer", nullable=true)
     */
    private $msgToType;

    /**
     * @var integer
     *
     * @ORM\Column(name="soft_delete", type="integer", nullable=false)
     */
    private $softDelete = '0';


    /**
     * Get msgId
     *
     * @return integer 
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set msgContent
     *
     * @param string $msgContent
     * @return ShopncMessage
     */
    public function setMsgContent($msgContent)
    {
        $this->msgContent = $msgContent;

        return $this;
    }

    /**
     * Get msgContent
     *
     * @return string 
     */
    public function getMsgContent()
    {
        return $this->msgContent;
    }

    /**
     * Set insertTime
     *
     * @param integer $insertTime
     * @return ShopncMessage
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
     * Set isRead
     *
     * @param integer $isRead
     * @return ShopncMessage
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return integer 
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set readTime
     *
     * @param integer $readTime
     * @return ShopncMessage
     */
    public function setReadTime($readTime)
    {
        $this->readTime = $readTime;

        return $this;
    }

    /**
     * Get readTime
     *
     * @return integer 
     */
    public function getReadTime()
    {
        return $this->readTime;
    }

    /**
     * Set msgType
     *
     * @param integer $msgType
     * @return ShopncMessage
     */
    public function setMsgType($msgType)
    {
        $this->msgType = $msgType;

        return $this;
    }

    /**
     * Get msgType
     *
     * @return integer 
     */
    public function getMsgType()
    {
        return $this->msgType;
    }

    /**
     * Set msgFrom
     *
     * @param integer $msgFrom
     * @return ShopncMessage
     */
    public function setMsgFrom($msgFrom)
    {
        $this->msgFrom = $msgFrom;

        return $this;
    }

    /**
     * Get msgFrom
     *
     * @return integer 
     */
    public function getMsgFrom()
    {
        return $this->msgFrom;
    }

    /**
     * Set msgFromname
     *
     * @param string $msgFromname
     * @return ShopncMessage
     */
    public function setMsgFromname($msgFromname)
    {
        $this->msgFromname = $msgFromname;

        return $this;
    }

    /**
     * Get msgFromname
     *
     * @return string 
     */
    public function getMsgFromname()
    {
        return $this->msgFromname;
    }

    /**
     * Set msgFromeType
     *
     * @param integer $msgFromeType
     * @return ShopncMessage
     */
    public function setMsgFromeType($msgFromeType)
    {
        $this->msgFromeType = $msgFromeType;

        return $this;
    }

    /**
     * Get msgFromeType
     *
     * @return integer 
     */
    public function getMsgFromeType()
    {
        return $this->msgFromeType;
    }

    /**
     * Set msgTo
     *
     * @param integer $msgTo
     * @return ShopncMessage
     */
    public function setMsgTo($msgTo)
    {
        $this->msgTo = $msgTo;

        return $this;
    }

    /**
     * Get msgTo
     *
     * @return integer 
     */
    public function getMsgTo()
    {
        return $this->msgTo;
    }

    /**
     * Set msgToname
     *
     * @param string $msgToname
     * @return ShopncMessage
     */
    public function setMsgToname($msgToname)
    {
        $this->msgToname = $msgToname;

        return $this;
    }

    /**
     * Get msgToname
     *
     * @return string 
     */
    public function getMsgToname()
    {
        return $this->msgToname;
    }

    /**
     * Set msgToType
     *
     * @param integer $msgToType
     * @return ShopncMessage
     */
    public function setMsgToType($msgToType)
    {
        $this->msgToType = $msgToType;

        return $this;
    }

    /**
     * Get msgToType
     *
     * @return integer 
     */
    public function getMsgToType()
    {
        return $this->msgToType;
    }

    /**
     * Set softDelete
     *
     * @param integer $softDelete
     * @return ShopncMessage
     */
    public function setSoftDelete($softDelete)
    {
        $this->softDelete = $softDelete;

        return $this;
    }

    /**
     * Get softDelete
     *
     * @return integer 
     */
    public function getSoftDelete()
    {
        return $this->softDelete;
    }


}
