<?php

namespace SiteBundle\Service;


use Symfony\Bridge\Doctrine\RegistryInterface;


class FeedServices
{


    protected $doctrine;

    private $action;
    private $notes;
    private $tickets;

    /**
     * @var array
     */
    private $feed;




    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }



    public function getTheLast($id, $centrale)
    {

        switch ($centrale){

            case 'CENTRALE_ROC_ECLERC':
                $action = $this->doctrine->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy([
                    'cl' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getRepository('AchatCentraleCrmBundle:ClientsNotes')->findBy([
                    'cl' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getRepository('AchatCentraleCrmBundle:MessageEntete')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);



                $this->setAction($action);
                $this->setNotes($notes);
                $this->setTickets($tickets);

                return $this;
                break;


        }





    }




    /**
     * @return mixed
     */
    public function getFeed()
    {
        return $this->feed;
    }

    /**
     * @param string $feed
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