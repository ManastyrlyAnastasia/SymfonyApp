<?php

namespace App\Repository;

use App\Entity\GrType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GrType>
 *
 * @method GrType|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrType|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrType[]    findAll()
 * @method GrType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrType::class);
    }

//    /**
//     * @return GrType[] Returns an array of GrType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GrType
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
