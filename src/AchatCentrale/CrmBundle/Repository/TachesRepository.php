<?php
namespace AchatCentrale\CrmBundle\Repository;



use Doctrine\ORM\EntityRepository;

class TachesRepository extends EntityRepository
{
    public function getActionTermine($id) {


        return $this->createQueryBuilder("taches")
            ->where("taches.usId = :id")
            ->andWhere('taches.claStatus = 1')
            ->setParameter('id', $id)
            ->orderBy("taches.claEcheance", "ASC")
            ->getQuery()
            ->execute();

    }

    public function getActionEnCour($id)
    {
        return $this->createQueryBuilder("taches")
            ->where("taches.usId = :id")
            ->andWhere('taches.claStatus = 0')
            ->setParameter('id', $id)
            ->orderBy("taches.claEcheance", "ASC")
            ->getQuery()
            ->execute();
    }
}