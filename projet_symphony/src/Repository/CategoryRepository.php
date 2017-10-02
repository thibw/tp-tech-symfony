<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function FindByCategory(){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c FROM App:Category'
            )
            ->getResult();
    }
}