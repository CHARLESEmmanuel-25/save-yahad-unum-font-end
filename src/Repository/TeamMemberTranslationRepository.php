<?php

namespace App\Repository;

use App\Entity\TeamMemberTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TeamMemberTranslation>
 *
 * @method TeamMemberTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamMemberTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamMemberTranslation[]    findAll()
 * @method TeamMemberTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamMemberTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamMemberTranslation::class);
    }

    public function save(TeamMemberTranslation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TeamMemberTranslation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TeamMemberTranslation[] Returns an array of TeamMemberTranslation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TeamMemberTranslation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
