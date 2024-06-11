<?php
// src/Repository/ReportHistoryRepository.php
namespace App\Repository;

use App\Entity\ReportHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReportHistory>
 *
 * @method ReportHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportHistory[]    findAll()
 * @method ReportHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReportHistory::class);
    }
}
