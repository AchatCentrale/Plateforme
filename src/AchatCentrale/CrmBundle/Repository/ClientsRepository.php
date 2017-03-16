<?php
namespace AchatCentrale\CrmBundle\Repository;



use Doctrine\ORM\EntityRepository;

class ClientsRepository extends EntityRepository
{
    public function getNb() {

        return $this->createQueryBuilder('Clients')

            ->select('COUNT(Clients)')

            ->getQuery()

            ->getSingleScalarResult();

    }
}