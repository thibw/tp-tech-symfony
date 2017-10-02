<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function FindByFiveLast(){
        return $this->getEntityManager()
            ->createQuery(
                #SELECT ALL
            'SELECT f FROM App:Product f ORDER BY f.id DESC'
            )
            ->setMaxResults(5)
            ->getResult();
    }

    public function FindByCategory($category_id){
        return $this->getEntityManager()
            ->createQuery(
            #SELECT ALL
                'SELECT f FROM App:Product f WHERE f.category = '.$category_id
            )
            ->getResult();
    }
}