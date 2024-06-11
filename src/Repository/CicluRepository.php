<?php

namespace App\Repository;

use App\Entity\Ciclu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ciclu>
 *
 * @method Ciclu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ciclu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ciclu[]    findAll()
 * @method Ciclu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CicluRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ciclu::class);
    }

//    /**
//     * @return Ciclu[] Returns an array of Ciclu objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ciclu
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
