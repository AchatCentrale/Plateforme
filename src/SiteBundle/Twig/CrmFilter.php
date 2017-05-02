<?php
namespace SiteBundle\Twig;





use Symfony\Bridge\Doctrine\RegistryInterface;



class CrmFilter extends \Twig_Extension
{

    protected $doctrine;
    // Retrieve doctrine from the constructor

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('phone', [$this, 'phoneFilter']),
            new \Twig_SimpleFilter('Time', [$this, 'dateFilter']),
            new \Twig_SimpleFilter('type', [$this, 'typeFilter']),
        );
    }

    public function phoneFilter($number)
    {

        if(strlen($number) == 10) {
            return chunk_split($number, 2, ' ');
        }else{
            return $number;
        }
    }

    public function dateFilter(\DateTime $date)
    {



        \Moment\Moment::setLocale('fr_FR');

        $m = new \Moment\Moment($date->format('Y-m-d H:i:s'), 'UTC');


        return $m->format('l dS F Y ');
    }

    public function typeFilter($type)
    {

        $em = $this->doctrine->getManager();

        $typee = $em->getRepository('AchatCentraleCrmBundle:ActionType')->findBy([
            'acId' => $type
        ]);

        dump($typee);
        return $typee[0]->getAcNom();
    }


}