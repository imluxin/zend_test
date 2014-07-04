<?php
namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncCustomer
 *
 * @ORM\Table(name="shopnc_customer")
 * @ORM\Entity
 */
class ShopncCustomer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="member_name", type="string", length=255, nullable=false)
     */
    private $memberName;

    /**
     * @var string
     *
     * @ORM\Column(name="member_pwd", type="string", length=255, nullable=false)
     */
    private $memberPwd;

    /**
     * @var string
     *
     * @ORM\Column(name="member_avatar", type="string", length=255, nullable=true)
     */
    private $memberAvatar;

    /**
     * @var string
     *
     * @ORM\Column(name="member_qq", type="string", length=255, nullable=true)
     */
    private $memberQq;

    /**
     * @var string
     *
     * @ORM\Column(name="member_website", type="string", length=255, nullable=true)
     */
    private $memberWebsite;

    /**
     * @var string
     *
     * @ORM\Column(name="member_email", type="string", length=255, nullable=true)
     */
    private $memberEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="member_phone", type="string", length=20, nullable=true)
     */
    private $memberPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="member_telphone", type="string", length=255, nullable=true)
     */
    private $memberTelphone;

    /**
     * @var string
     *
     * @ORM\Column(name="real_name", type="string", length=255, nullable=true)
     */
    private $realName;

    /**
     * @var string
     *
     * @ORM\Column(name="member_time", type="string", length=255, nullable=true)
     */
    private $memberTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_login_num", type="integer", nullable=true)
     */
    private $memberLoginNum;

    /**
     * @var string
     *
     * @ORM\Column(name="member_last_login", type="string", length=255, nullable=true)
     */
    private $memberLastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="member_address", type="string", length=255, nullable=true)
     */
    private $memberAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="authorize", type="integer", nullable=true)
     */
    private $authorize;
    
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }
    
    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = ($val !== null) ? $val : null;
            }
        }
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
     * @return ShopncCustomer
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
     * Set memberPwd
     *
     * @param string $memberPwd
     * @return ShopncCustomer
     */
    public function setMemberPwd($memberPwd)
    {
        $this->memberPwd = $memberPwd;

        return $this;
    }

    /**
     * Get memberPwd
     *
     * @return string 
     */
    public function getMemberPwd()
    {
        return $this->memberPwd;
    }

    /**
     * Set memberAvatar
     *
     * @param string $memberAvatar
     * @return ShopncCustomer
     */
    public function setMemberAvatar($memberAvatar)
    {
        $this->memberAvatar = $memberAvatar;

        return $this;
    }

    /**
     * Get memberAvatar
     *
     * @return string 
     */
    public function getMemberAvatar()
    {
        return $this->memberAvatar;
    }

    /**
     * Set memberQq
     *
     * @param string $memberQq
     * @return ShopncCustomer
     */
    public function setMemberQq($memberQq)
    {
        $this->memberQq = $memberQq;

        return $this;
    }

    /**
     * Get memberQq
     *
     * @return string 
     */
    public function getMemberQq()
    {
        return $this->memberQq;
    }

    /**
     * Set memberWebsite
     *
     * @param string $memberWebsite
     * @return ShopncCustomer
     */
    public function setMemberWebsite($memberWebsite)
    {
        $this->memberWebsite = $memberWebsite;

        return $this;
    }

    /**
     * Get memberWebsite
     *
     * @return string 
     */
    public function getMemberWebsite()
    {
        return $this->memberWebsite;
    }

    /**
     * Set memberEmail
     *
     * @param string $memberEmail
     * @return ShopncCustomer
     */
    public function setMemberEmail($memberEmail)
    {
        $this->memberEmail = $memberEmail;

        return $this;
    }

    /**
     * Get memberEmail
     *
     * @return string 
     */
    public function getMemberEmail()
    {
        return $this->memberEmail;
    }

    /**
     * Set memberPhone
     *
     * @param string $memberPhone
     * @return ShopncCustomer
     */
    public function setMemberPhone($memberPhone)
    {
        $this->memberPhone = $memberPhone;

        return $this;
    }

    /**
     * Get memberPhone
     *
     * @return string 
     */
    public function getMemberPhone()
    {
        return $this->memberPhone;
    }

    /**
     * Set memberTelphone
     *
     * @param string $memberTelphone
     * @return ShopncCustomer
     */
    public function setMemberTelphone($memberTelphone)
    {
        $this->memberTelphone = $memberTelphone;

        return $this;
    }

    /**
     * Get memberTelphone
     *
     * @return string 
     */
    public function getMemberTelphone()
    {
        return $this->memberTelphone;
    }

    /**
     * Set realName
     *
     * @param string $realName
     * @return ShopncCustomer
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;

        return $this;
    }

    /**
     * Get realName
     *
     * @return string 
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * Set memberTime
     *
     * @param string $memberTime
     * @return ShopncCustomer
     */
    public function setMemberTime($memberTime)
    {
        $this->memberTime = $memberTime;

        return $this;
    }

    /**
     * Get memberTime
     *
     * @return string 
     */
    public function getMemberTime()
    {
        return $this->memberTime;
    }

    /**
     * Set memberLoginNum
     *
     * @param integer $memberLoginNum
     * @return ShopncCustomer
     */
    public function setMemberLoginNum($memberLoginNum)
    {
        $this->memberLoginNum = $memberLoginNum;

        return $this;
    }

    /**
     * Get memberLoginNum
     *
     * @return integer 
     */
    public function getMemberLoginNum()
    {
        return $this->memberLoginNum;
    }

    /**
     * Set memberLastLogin
     *
     * @param string $memberLastLogin
     * @return ShopncCustomer
     */
    public function setMemberLastLogin($memberLastLogin)
    {
        $this->memberLastLogin = $memberLastLogin;

        return $this;
    }

    /**
     * Get memberLastLogin
     *
     * @return string 
     */
    public function getMemberLastLogin()
    {
        return $this->memberLastLogin;
    }

    /**
     * Set memberAddress
     *
     * @param string $memberAddress
     * @return ShopncCustomer
     */
    public function setMemberAddress($memberAddress)
    {
        $this->memberAddress = $memberAddress;

        return $this;
    }

    /**
     * Get memberAddress
     *
     * @return string 
     */
    public function getMemberAddress()
    {
        return $this->memberAddress;
    }

    /**
     * Set authorize
     *
     * @param integer $authorize
     * @return ShopncCustomer
     */
    public function setAuthorize($authorize)
    {
        $this->authorize = $authorize;

        return $this;
    }

    /**
     * Get authorize
     *
     * @return integer 
     */
    public function getAuthorize()
    {
        return $this->authorize;
    }


}
