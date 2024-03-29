<?php

namespace App\Repository;

use App\Entity\LocationSansChauffeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LocationSansChauffeur>
 *
 * @method LocationSansChauffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationSansChauffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationSansChauffeur[]    findAll()
 * @method LocationSansChauffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationSansChauffeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationSansChauffeur::class);
    }

    public function save(LocationSansChauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LocationSansChauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LocationSansChauffeur[] Returns an array of LocationSansChauffeur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LocationSansChauffeur
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
