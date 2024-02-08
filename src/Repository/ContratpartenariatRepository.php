<?php

namespace App\Repository;

use App\Entity\Contratpartenariat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contratpartenariat>
 *
 * @method Contratpartenariat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contratpartenariat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contratpartenariat[]    findAll()
 * @method Contratpartenariat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratpartenariatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contratpartenariat::class);
    }

//    /**
//     * @return Contratpartenariat[] Returns an array of Contratpartenariat objects
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

//    public function findOneBySomeField($value): ?Contratpartenariat
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
