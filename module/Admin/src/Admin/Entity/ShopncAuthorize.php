<?php
namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncAuthorize
 *
 * @ORM\Table(name="shopnc_authorize")
 * @ORM\Entity
 */
class ShopncAuthorize
{
    /**
     * @var integer
     *
     * @ORM\Column(name="auth_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $authId;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_user", type="string", length=200, nullable=false)
     */
    private $authUser;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_url", type="string", length=100, nullable=false)
     */
    private $authUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_code", type="string", length=50, nullable=false)
     */
    private $authCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_version", type="string", length=50, nullable=true)
     */
    private $productVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="php_version", type="string", length=50, nullable=true)
     */
    private $phpVersion;

    /**
     * @var integer
     *
     * @ORM\Column(name="auth_time", type="integer", nullable=false)
     */
    private $authTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="server_endtime", type="integer", nullable=false)
     */
    private $serverEndtime;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_remark", type="text", nullable=true)
     */
    private $authRemark;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;


    /**
     * Get authId
     *
     * @return integer 
     */
    public function getAuthId()
    {
        return $this->authId;
    }

    /**
     * Set authUser
     *
     * @param string $authUser
     * @return ShopncAuthorize
     */
    public function setAuthUser($authUser)
    {
        $this->authUser = $authUser;

        return $this;
    }

    /**
     * Get authUser
     *
     * @return string 
     */
    public function getAuthUser()
    {
        return $this->authUser;
    }

    /**
     * Set authUrl
     *
     * @param string $authUrl
     * @return ShopncAuthorize
     */
    public function setAuthUrl($authUrl)
    {
        $this->authUrl = $authUrl;

        return $this;
    }

    /**
     * Get authUrl
     *
     * @return string 
     */
    public function getAuthUrl()
    {
        return $this->authUrl;
    }

    /**
     * Set authCode
     *
     * @param string $authCode
     * @return ShopncAuthorize
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;

        return $this;
    }

    /**
     * Get authCode
     *
     * @return string 
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return ShopncAuthorize
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

    /**
     * Set productVersion
     *
     * @param string $productVersion
     * @return ShopncAuthorize
     */
    public function setProductVersion($productVersion)
    {
        $this->productVersion = $productVersion;

        return $this;
    }

    /**
     * Get productVersion
     *
     * @return string 
     */
    public function getProductVersion()
    {
        return $this->productVersion;
    }

    /**
     * Set phpVersion
     *
     * @param string $phpVersion
     * @return ShopncAuthorize
     */
    public function setPhpVersion($phpVersion)
    {
        $this->phpVersion = $phpVersion;

        return $this;
    }

    /**
     * Get phpVersion
     *
     * @return string 
     */
    public function getPhpVersion()
    {
        return $this->phpVersion;
    }

    /**
     * Set authTime
     *
     * @param integer $authTime
     * @return ShopncAuthorize
     */
    public function setAuthTime($authTime)
    {
        $this->authTime = $authTime;

        return $this;
    }

    /**
     * Get authTime
     *
     * @return integer 
     */
    public function getAuthTime()
    {
        return $this->authTime;
    }

    /**
     * Set serverEndtime
     *
     * @param integer $serverEndtime
     * @return ShopncAuthorize
     */
    public function setServerEndtime($serverEndtime)
    {
        $this->serverEndtime = $serverEndtime;

        return $this;
    }

    /**
     * Get serverEndtime
     *
     * @return integer 
     */
    public function getServerEndtime()
    {
        return $this->serverEndtime;
    }

    /**
     * Set authRemark
     *
     * @param string $authRemark
     * @return ShopncAuthorize
     */
    public function setAuthRemark($authRemark)
    {
        $this->authRemark = $authRemark;

        return $this;
    }

    /**
     * Get authRemark
     *
     * @return string 
     */
    public function getAuthRemark()
    {
        return $this->authRemark;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     * @return ShopncAuthorize
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
}



