<?php
namespace Admin\Repository;

use Doctrine\ORM\EntityRepository;

class ShopncConsultativeRepository extends EntityRepository
{
    public function getAllConsultative($page = false, $num_per_page = '0')
    {
        $qb = $this->createQueryBuilder('c')
                   ->orderBy('c.insertTime', 'DESC');
        if (isset($page)) {
        	$qb->setFirstResult($page*$num_per_page);
        }
        if (!empty($num_per_page)) {
        	$qb->setMaxResults($num_per_page);
        }
        
        $result = $qb->getQuery()->getResult();
        
        return $result;
    }
    
    public function getTotalNum()
    {
         $num = $this->createQueryBuilder('c')
                    ->orderBy('c.insertTime', 'DESC')
                    ->getQuery()->getArrayResult();          
         ;
         return count($num);
    }
    
}

