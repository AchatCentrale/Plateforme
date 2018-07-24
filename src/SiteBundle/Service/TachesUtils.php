<?php

namespace SiteBundle\Service;


use Symfony\Component\Templating\EngineInterface;



class TachesUtils
{





    public function utf8_encode_datetime($Datetime){


        return utf8_encode(date_format($Datetime, 'd-m-Y H:i:s'));

    }




}