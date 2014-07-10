<?php
namespace Admin\Repository;

use Doctrine\ORM\EntityRepository;

class AlbumRepository extends EntityRepository
{

    public function getAllAlbums()
    {
        $qb = $this->createQueryBuilder('e');
        
        $result = $qb->select()->getQuery()->getResult();
        
        return $result;
    }
    
    public function go_test()
    {
        return 'test album';
    }
}

