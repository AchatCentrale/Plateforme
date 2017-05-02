<?php
namespace SiteBundle\Twig;





class CrmFilter extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('phone', [$this, 'phoneFilter']),
            new \Twig_SimpleFilter('Time', [$this, 'dateFilter']),
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


}