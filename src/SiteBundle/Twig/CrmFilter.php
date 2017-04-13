<?php
namespace SiteBundle\Twig;





class CrmFilter extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('phone', [$this, 'phoneFilter']),
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


}