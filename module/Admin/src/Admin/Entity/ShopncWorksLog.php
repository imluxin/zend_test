<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorksLog
 *
 * @ORM\Table(name="shopnc_works_log")
 * @ORM\Entity
 */
class ShopncWorksLog
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
    private $logUser;

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
     * @ORM\Column(name="log_work_id", type="integer", nullable=false)
     */
    private $logWorkId;

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate ($data = array())
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
    }
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy ()
    {
        return get_object_vars($this);
    }


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
     * @return ShopncWorksLog
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
     * @return ShopncWorksLog
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
     * @return ShopncWorksLog
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
     * @return ShopncWorksLog
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
     * Set logWorkId
     *
     * @param integer $logWorkId
     * @return ShopncWorksLog
     */
    public function setLogWorkId($logWorkId)
    {
        $this->logWorkId = $logWorkId;

        return $this;
    }

    /**
     * Get logWorkId
     *
     * @return integer 
     */
    public function getLogWorkId()
    {
        return $this->logWorkId;
    }

}
