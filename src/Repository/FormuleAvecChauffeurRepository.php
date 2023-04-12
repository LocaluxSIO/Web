<?php

namespace App\Repository;

use App\Entity\FormuleAvecChauffeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormuleAvecChauffeur>
 *
 * @method FormuleAvecChauffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormuleAvecChauffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormuleAvecChauffeur[]    findAll()
 * @method FormuleAvecChauffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormuleAvecChauffeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormuleAvecChauffeur::class);
    }

    public function save(FormuleAvecChauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FormuleAvecChauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FormuleAvecChauffeur[] Returns an array of FormuleAvecChauffeur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormuleAvecChauffeur
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
