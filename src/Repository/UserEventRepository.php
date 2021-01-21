<?php

namespace App\Repository;

use App\Entity\UserEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEvent[]    findAll()
 * @method UserEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserEvent::class);
    }
    
    /**
    * @return UserEvent[] Returns an array of UserEvent objects
    */
    public function findBetweenDates($beginDate, $finishDate ): array {

        return $this->createQueryBuilder('user_event')
            ->where('user_event.creation_date BETWEEN :begin AND :finish')
            ->setParameter('begin', $beginDate)
            ->setParameter('finish', $finishDate)
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    
}
