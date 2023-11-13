<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function add(Article $entity, bool $flush = false): void
  {
      $this->getEntityManager()->persist($entity);

      if ($flush) {
          $this->getEntityManager()->flush();
      }
  }

  public function remove(Article $entity, bool $flush = false): void
  {
      $this->getEntityManager()->remove($entity);

      if ($flush) {
          $this->getEntityManager()->flush();
      }
  }

    /**
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function getAllArticles(int $offset = 0, int $limit = 10)
    {
        return $this->createQueryBuilder('a')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->orderBy('a.name', 'ASC');
            ->getQuery()
            ->getResult();
    }
}
