<?php
namespace Admin\Repository;

use Doctrine\ORM\EntityRepository;

class ShopncWorksWorkerRepository extends EntityRepository
{

    public function getAllActiveByMemberId($worker_id)
    {
        $qb = $this->createQueryBuilder('ww')
                   ->select(array('ww, w'))
                   ->leftJoin('Admin\Entity\ShopncWorks', 'w', 'WITH', 'ww.workId = w.workId')
//                    ->addSelect('w')
                   ->where('ww.workerId = :worker_id')
                   ->groupBy('ww.workId')
                   ->setParameter('worker_id', $worker_id);
        
        $result = $qb->getQuery()->getResult();
        
        return $result;
    }
}

