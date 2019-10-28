<?php

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transaction[]    findAll()
 * @method Transaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    // /**
    //  * @return Transaction[] Returns an array of Transaction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Transaction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */




      /**
          * @return Transaction[] Returns an array of Transaction objects
          */
        public function findBetweenDate($user,$date1,$date2)
        {
            return $this->createQueryBuilder('t')
                ->andWhere('t.user = :user')
                ->andWhere('t.DateTransaction >= :date1')
                ->andWhere('t.DateTransaction <= :date2')
                ->setParameter('user', $user)
                ->setParameter('date1', $date1)
                ->setParameter('date2', $date2)
                ->getQuery()
                ->getResult()
            ;
        }



        /**
                  * @return Transaction[] Returns an array of Transaction objects
                  */
                public function findBetweenDateAdmin($date1,$date2,$compte)
                {
                    return $this->createQueryBuilder('t')
                        ->andWhere('t.DateTransaction >= :date1')
                        ->andWhere('t.DateTransaction <= :date2')
                        ->andWhere('t.Compte = :compte')
                        ->setParameter('date1', $date1)
                        ->setParameter('date2', $date2)
                        ->setParameter('compte', $compte)
                        ->getQuery()
                        ->getResult()
                    ;
                }
}
