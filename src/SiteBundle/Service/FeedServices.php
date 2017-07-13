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


            case 'ACHAT_CENTRALE':
                $action = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsTaches')->findBy([
                    'clId' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsNotes')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:MessageEntete')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);



                $this->setAction($action);
                $this->setNotes($notes);
                $this->setTickets($tickets);

                return $this;
                break;
            case 'ROC_ECLERC':
                $action = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsTaches')->findBy([
                    'clId' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsNotes')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getManager('roc_eclerc')->getRepository('RocEclercBundle:MessageEntete')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);



                $this->setAction($action);
                $this->setNotes($notes);
                $this->setTickets($tickets);

                return $this;
                break;
            case 'CENTRALE_FUNECAP':
                $action = $this->doctrine->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsTaches')->findBy([
                    'clId' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsNotes')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getManager('centrale_funecap')->getRepository('FunecapBundle:MessageEntete')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);



                $this->setAction($action);
                $this->setNotes($notes);
                $this->setTickets($tickets);

                return $this;
                break;
            case 'CENTRALE_GCCP':
                $action = $this->doctrine->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsTaches')->findBy([
                    'clId' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsNotes')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getManager('centrale_gccp')->getRepository('GccpBundle:MessageEntete')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);



                $this->setAction($action);
                $this->setNotes($notes);
                $this->setTickets($tickets);

                return $this;
                break;
            case 'CENTRALE_PFPL':
                $action = $this->doctrine->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsTaches')->findBy([
                    'clId' => $id
                ], [
                    'claEcheance' => 'ASC'
                ],  5);

                $notes = $this->doctrine->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsNotes')->findBy([
                    'clId' => $id
                ], [
                    'insDate' => 'ASC'
                ], 5);

                $tickets = $this->doctrine->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:MessageEntete')->findBy([
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