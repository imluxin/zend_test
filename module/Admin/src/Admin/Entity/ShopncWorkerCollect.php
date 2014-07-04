<?php
namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ShopncWorkerCollect
 *
 * @ORM\Table(name="shopnc_worker_collect")
 * @ORM\Entity
 */
class ShopncWorkerCollect
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
     * @var string
     *
     * @ORM\Column(name="worker_collect", type="text", nullable=true)
     */
    private $workerCollect;


    /**
     * Get workerId
     *
     * @return integer 
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * Set workerCollect
     *
     * @param string $workerCollect
     * @return ShopncWorkerCollect
     */
    public function setWorkerCollect($workerCollect)
    {
        $this->workerCollect = $workerCollect;

        return $this;
    }

    /**
     * Get workerCollect
     *
     * @return string 
     */
    public function getWorkerCollect()
    {
        return $this->workerCollect;
    }


}
