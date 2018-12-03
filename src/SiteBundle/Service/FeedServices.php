<?php

namespace SiteBundle\Service;


use Symfony\Bridge\Doctrine\RegistryInterface;


class FeedServices
{


    /**
     *
     * @var Connection
     */
    private $connection;

    protected $doctrine;

    protected $clientService;

    private $action;
    private $notes;
    private $tickets;

    /**
     * @var array
     */
    private $feed;


    public function __construct(RegistryInterface $doctrine, $dbalConnection, ClientServices $clientService )
    {
        $this->doctrine = $doctrine;

        $this->connection = $dbalConnection;

        $this->clientService = $clientService;

    }


    public function getTheLast($id, $centrale)
    {


        $so_database = $this->clientService->getCentraleDB($centrale);


        $sqlAction = sprintf("SELECT TOP 5 *, (SELECT 'taches') FROM %s.dbo.CLIENTS_TACHES WHERE CL_ID = :id ORDER BY CLA_ECHEANCE DESC", $so_database);
        $stmt = $this->connection->prepare($sqlAction);
        $stmt->bindValue("id", $id);
        $stmt->execute();

        $action = $stmt->fetchAll();


        $sqlNotes = sprintf("SELECT TOP 5 *, (SELECT 'notes') FROM %s.dbo.CLIENTS_NOTES WHERE CL_ID = :id ORDER BY INS_DATE DESC", $so_database);
        $stmtNotes = $this->connection->prepare($sqlNotes);
        $stmtNotes->bindValue("id", $id);
        $stmtNotes->execute();

        $notes = $stmtNotes->fetchAll();



        $sqlTickets = sprintf("SELECT TOP 5 *, (SELECT 'tickets') FROM %s.dbo.MESSAGE_ENTETE WHERE CL_ID = :id ORDER BY INS_DATE DESC ", $so_database);
        $stmtTickets = $this->connection->prepare($sqlTickets);
        $stmtTickets->bindValue("id", $id);
        $stmtTickets->execute();

        $tickets = $stmtTickets->fetchAll();



        $this->setAction($action);
        $this->setNotes($notes);
        $this->setTickets($tickets);




        return $this;






    }

    public function showTheFeed()
    {





        if ($this->getAction() === null && $this->getTickets() === null && $this->getNotes() === null) {
            $result = [];
        } else {
            $result = array_merge($this->getAction(), $this->getTickets(), $this->getNotes());

        }


        $this->setFeed($result);


    }

    /**
     * @return array
     */
    public function getFeed()
    {
        return $this->feed;
    }

    /**
     * @param array $feed
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;
    }


    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }


}