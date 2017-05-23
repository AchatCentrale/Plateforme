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
            new \Twig_SimpleFilter('priorite', [$this, 'priorityFilter']),
            new \Twig_SimpleFilter('timeFromNow', [$this, 'timeFromNowFilter']),
            new \Twig_SimpleFilter('siret', [$this, 'siretFilter']),
        );
    }

    public function phoneFilter($number)
    {

        if (strlen($number) == 10) {
            return chunk_split($number, 2, ' ');
        } else {
            return $number;
        }
    }

    public function siretFilter($siret)
    {
        $result = [];

        for ($i = 0; $i <= strlen($siret); $i++) {


            if($i === 3){
                array_push($result, substr($siret, 0, 3) );
                array_push($result, " ");
            }else if ($i === 6){
                array_push($result, substr($siret, 3, 3) );
                array_push($result, " ");
            }else if($i === 9){
                array_push($result, substr($siret, 6, 3) );
                array_push($result, " ");
            }else if($i === 14){
                array_push($result, substr($siret, 9, 5) );


            }
        }


        return implode($result);
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

        return $typee[0]->getAcNom();
    }

    public function priorityFilter($priorité)
    {

        switch ($priorité) {
            case 1:
                $tpl = "<div class=\"ui red label\">A faire au plus vite</div>";
                return $tpl;
            case 2:
                $tpl = "<div class=\"ui orange label\">Important</div>";
                return $tpl;
            case 3:
                $tpl = "<div class=\"ui yellow label\">Moyen</div>";
                return $tpl;
            case 4:
                $tpl = "<div class=\"ui green label\">Faible</div>";
                return $tpl;
            case 5:
                $tpl = "<div class=\"ui blue label\">Un jour peut être</div>";
                return $tpl;


        }

    }

    public function timeFromNowFilter(\DateTime $date)
    {
        \Moment\Moment::setLocale('fr_FR');

        $m = new \Moment\Moment($date->format('Y-m-d H:i:s'), 'UTC');
        $momentFromVo = $m->fromNow();


        return $momentFromVo->getRelative();
    }

}