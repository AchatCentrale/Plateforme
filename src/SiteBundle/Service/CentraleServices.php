<?php

namespace SiteBundle\Service;

use Doctrine\DBAL\Connection;

class CentraleServices
{



    /**
     *
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $dbalConnection)  {
        $this->connection = $dbalConnection;
    }


}