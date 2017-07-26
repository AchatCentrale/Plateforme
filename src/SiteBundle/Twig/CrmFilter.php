<?php

namespace SiteBundle\Twig;


use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Twig_Function;


class CrmFilter extends \Twig_Extension
{

    protected $doctrine;


    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getFunctions()
    {
        return array(
            new Twig_Function('randFacture', [$this, 'generateFactureNumber']),
        );
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
            new \Twig_SimpleFilter('status', [$this, 'statusFilter']),
            new \Twig_SimpleFilter('isEmpty', [$this, 'isEmpty']),
            new \Twig_SimpleFilter('centrale', [$this, 'centraleFilter']),
            new \Twig_SimpleFilter('etat', [$this, 'etatTache']),
            new \Twig_SimpleFilter('dateString', [$this, 'dateString']),
            new \Twig_SimpleFilter('fromNowString', [$this, 'dateFromNowString']),
            new \Twig_SimpleFilter('centraleLabel', [$this, 'centraleLabel']),
            new \Twig_SimpleFilter('limitLength', [$this, 'limitLength']),
            new \Twig_SimpleFilter('formatVille', [$this, 'formatVille']),
        );
    }


    public function generateFactureNumber($centrale)
    {

        $result = "";

        switch ($centrale){

            case "CENTRALE_FUNECAP":

                $result .= "FUN-";

                $rand = rand(1, 24);

                for ($i = 0; $i <= 8; $i++){
                    $rand .= rand(1, 9);

                }



                $result = $result . $rand;

                break;
            case "CENTRALE_ROC_ECLERC":

                $result .= "ROC-";

                $rand = rand(1, 24);

                for ($i = 0; $i <= 8; $i++){
                    $rand .= rand(1, 9);
                }
                $result = $result . $rand;
                break;


        }


        return $result;
    }

    public function centraleLabel($centrale)
    {


        if(gettype($centrale) === "string"){
            switch ($centrale){
                case 'ROC ECLERC':
                    return "<h3><span class=\"label big label-warning \">Centrale Roc-Eclerc</span></h3>";
                    break;
                case 'CENTRALE FUNECAP':
                    return "<h3><span class=\"label big label-danger \">Centrale Funecap</span></h3>";
                    break;
                case 'CENTRALE GCCP':
                    return "<h3><span class=\"label big label-danger \">Centrale GCCP</span></h3>";
                    break;
                case 'ACHAT CENTRALE':
                    return "<h3><span class=\"label big label-danger \">Achat centrale</span></h3>";
                    break;
                case 'CENTRALE PFPL':
                    return "<h3><span class=\"label big label-danger \">Centrale PFPL</span></h3>";
                    break;
            }
            return $centrale;
        }else{
            switch ($centrale){
                case '1':
                    return "<h3><span class=\"label big label-primary \">Achat Centrale</span></h3>";
                    break;
                case '2':
                    return "<h3><span class=\"label big label-default \">Centrale GCCP</span></h3>";
                    break;
                case '3':
                    return "<h3><span class=\"label big label-danger \">Centrale PROMUCF</span></h3>";
                    break;
                case '4':
                    return "<h3><span class=\"label big label-danger \">Centrale Funecap</span></h3>";
                    break;
                case '5':
                    return "<h3><span class=\"label big label-success \">Centrale PFPL</span></h3>";
                    break;
                case '6':
                    return "<h3><span class=\"label big label-warning \">Centrale Roc-Eclerc</span></h3>";
                    break;

            }
        }




        return $centrale;

    }

    public function dateString($date)
    {
        \Moment\Moment::setLocale('fr_FR');


        $m = new \Moment\Moment($date);

        return $m->format('ll', new \Moment\CustomFormats\MomentJs());

    }
    public function dateFromNowString($date)
    {

        \Moment\Moment::setLocale('fr_FR');


        $m = new \Moment\Moment($date);
        $momentFromVo = $m->fromNow();


        return $momentFromVo->getRelative();



    }

    public function etatTache($state)
    {

        $green = '<p class="pastille orange" ></p>';

        switch ($state)
        {
            case 0:
                return '<p class="pastille blue" ></p>';
                break;
            case 1:
                return '<p class="pastille orange" ></p>';
                break;
            case 2:
                return '<p class="pastille green" ></p>';
                break;
            case 3:
                return '<p class="pastille red" ></p>';
                break;
            case 4:
                return '<p class="pastille purple" ></p>';
                break;
            default:
                break;

        }


        return $state;
    }

    public function centraleFilter($centrale)
    {

        if(gettype($centrale) === "string"){

            switch ($centrale){
                case "CENTRALE_FUNECAP":
                    return "centrale-".substr($centrale, 9);
                    break;
                case 'ROC_ECLERC':
                    return "centrale-".strtolower(str_replace("_","-", $centrale ));
                    break;
                case 'ACHAT_CENTRALE':
                    return "achatcentrale";
                    break;
                case 'CENTRALE_PFPL':
                    return strtolower(str_replace("_","-", $centrale ));
                    break;
                case 'CENTRALE_GCCP':
                    return strtolower(str_replace("_","-", $centrale ));
                    break;
            }
        }else{
            switch ($centrale){
                case "1":
                    return "ACHAT_CENTRALE";
                    break;
                case '2':
                    return "CENTRALE_GCCP";
                    break;
                case '4':
                    return "CENTRALE_FUNECAP";
                    break;
                case '5':
                    return "CENTRALE_PFPL";
                    break;
                case '6':
                    return "ROC_ECLERC";
                    break;
            }
        }



    }

    public function statusFilter($status){

        switch ($status){
            case 0:
                return "A Validé";
                break;
            case 1:
                return "Validé";
                break;
            case 2:
                return "Bloqué";
                break;
            default:
                break;
        }

        return $status;
    }

    public function isEmpty($input){




        if(empty($input)){
            return "<h2>à remplire</h2>";
        }else{
            return $input;
        }

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

    public function dateFilter(\DateTime $date = null)
    {

       if(gettype($date) === null){
           return $date;

       }else{
           \Moment\Moment::setLocale('fr_FR');

           $m = new \Moment\Moment($date->format('Y-m-d H:i:s'), 'UTC');


           return $m->format('l dS F Y ');
       }
    }

    public function typeFilter($type)
    {

        $em = $this->doctrine->getManager('achat_centrale');

        $typee = $em->getRepository('AchatCentraleBundle:ActionType')->findBy([
            'acId' => $type
        ]);




        $typeDB = $typee[0]->getAcNom();

        switch ($typeDB){
            case "Envoi devis":
                return '<i class="bar big chart icon"></i>';
                break;
            case "Relance":
                return '<i class=" big history icon"></i>';
                break;
            case "Appel":
                return '<i class="call big square icon"></i>';
                break;
            case "Administratif":
                return '<i class="sticky big note outline icon"></i>';
                break;
        }



    }

    public function priorityFilter($priorite)
    {

        switch ($priorite) {
            case 1:
                $tpl = "<div class=\"ui medium red label\">A faire au plus vite</div>";
                return $tpl;
            case 2:
                $tpl = "<div class=\"ui medium orange label\">Important</div>";
                return $tpl;
            case 3:
                $tpl = "<div class=\"ui medium yellow label\">Moyen</div>";
                return $tpl;
            case 4:
                $tpl = "<div class=\"ui medium green label\">Faible</div>";
                return $tpl;
            case 5:
                $tpl = "<div class=\"ui medium blue label\">Un jour peut être</div>";
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

    public function limitLength($word){


        if (strlen($word) >= 30){
            $chaine = substr($word, 0, 50);

            return $chaine. '.....';
        } else{
            return $word;
        }

    }


    public function formatVille($word)
    {


        $result = strtolower( $word );
        return ucwords($result);
    }

}