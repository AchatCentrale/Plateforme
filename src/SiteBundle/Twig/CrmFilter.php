<?php

namespace SiteBundle\Twig;


use Symfony\Bridge\Doctrine\RegistryInterface;
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
            new \Twig_SimpleFilter('userFilter', [$this, 'userFilter']),
            new \Twig_SimpleFilter('avatar', [$this, 'getAvatar']),
            new \Twig_SimpleFilter('getClass', [$this, 'getClass']),
            new \Twig_SimpleFilter('centraleTickets', [$this, 'centraleTickets']),
            new \Twig_SimpleFilter('isNumeric', [$this, 'isNumeric']),
            new \Twig_SimpleFilter('month', [$this, 'monthIntToString']),
        );
    }



    public function getClass($class){
        return (new \ReflectionClass($class))->getShortName();

    }

    public function generateFactureNumber($centrale)
    {

        $result = "";

        switch ($centrale) {

            case "CENTRALE_FUNECAP":

                $result .= "FUN-";

                $rand = rand(1, 24);

                for ($i = 0; $i <= 8; $i++) {
                    $rand .= rand(1, 9);

                }


                $result = $result . $rand;

                break;
            case "CENTRALE_ROC_ECLERC":

                $result .= "ROC-";

                $rand = rand(1, 24);

                for ($i = 0; $i <= 8; $i++) {
                    $rand .= rand(1, 9);
                }
                $result = $result . $rand;
                break;


        }


        return $result;
    }

    public function centraleLabel($centrale)
    {


        if (gettype($centrale) === "string" && ctype_digit($centrale) === false) {
            switch ($centrale) {
                case 'ROC_ECLERC':
                case 'ROC ECLERC':
                    return "<h3><span class=\"label large yellow \">Centrale Roc-Eclerc</span></h3>";
                    break;
                case 'CENTRALE_FUNECAP':
                case 'CENTRALE FUNECAP':
                    return "<h3><span class=\"label large label-danger \">Centrale Funecap</span></h3>";
                    break;
                case 'CENTRALE_GCCP':
                case 'CENTRALE GCCP':
                    return "<h3><span class=\"label large label-danger \">Centrale GCCP</span></h3>";
                    break;
                case'ACHAT_CENTRALE':
                case 'ACHAT CENTRALE':
                    return "<h3><span class=\"label large label-danger \">Achat Centrale</span></h3>";
                    break;
                case 'CENTRALE_PFPL':
                case 'CENTRALE PFPL':
                    return "<h3><span class=\"label large label-danger \">Centrale PFPL</span></h3>";
                    break;
            }
            return $centrale;
        } else {


            switch ($centrale) {
                case '1':
                    return "<div class=\"little-pic-centrale\"><img src=\"/assets/images/logo-ac-tiny.png\" alt=\"\"></div>";
                    break;
                case '2':
                    return "<div class=\"little-pic-centrale\"><img src=\"/assets/images/logo-gccp-tiny.png\" alt=\"\"></div>";
                    break;
                case '3':
                    return "<h3><span class=\"label big label-danger \">Centrale PROMUCF</span></h3>";
                    break;
                case '4':
                    return "<div class=\"little-pic-centrale\"><img src=\"/assets/images/logo-funecap-tiny.png\" alt=\"\"></div>";
                    break;
                case '5':
                    return "<div class=\"little-pic-centrale\"><img src=\"/assets/images/logo-pfpl-tiny.jpg\" alt=\"\"></div>";
                    break;
                case '6':
                    return "<div class=\"little-pic-centrale\"><img src=\"/assets/images/logo-roc-tiny.png\" alt=\"\"></div>";
                    break;

            }
        }


        return $centrale;

    }

    public function dateString($date)
    {
        \Moment\Moment::setLocale('fr_FR');


        $m = new \Moment\Moment($date);

        return $m->format('lll', new \Moment\CustomFormats\MomentJs());

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

        switch ($state) {
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
            case 20:
                return '<i class="check huge square icon"></i>';
                break;
            default:
                break;

        }


        return $state;
    }

    public function centraleFilter($centrale)
    {

        if (gettype($centrale) === "string") {

            switch ($centrale) {
                case "CENTRALE_FUNECAP":
                    return "centrale-" . substr($centrale, 9);
                    break;
                case 'ROC_ECLERC':
                    return "centrale-" . strtolower(str_replace("_", "-", $centrale));
                    break;
                case 'ACHAT_CENTRALE':
                    return "achatcentrale";
                    break;
                case 'CENTRALE_PFPL':
                    return strtolower(str_replace("_", "-", $centrale));
                    break;
                case 'CENTRALE_GCCP':
                    return strtolower(str_replace("_", "-", $centrale));
                    break;
            }
        } else {
            switch ($centrale) {
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

    public function centraleTickets($centrale){

        switch ($centrale) {
            case "1":
                return "CENTRALE_ACHAT";
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

    public function statusFilter($status)
    {

        switch ($status) {
            case 0:
                return "A Valider";
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

    public function isEmpty($input)
    {

        if (!isset($input)) {
            return "À remplir";
        } else {
            return $input;
        }

    }

    public function phoneFilter($number)
    {

        if (empty($number)){
            return "À remplir";
        }



        if (strlen($number) == 10 ) {
            return chunk_split($number, 2, ' ');
        } else {
            return $number;
        }
    }

    public function siretFilter($siret)
    {
        $result = [];

        for ($i = 0; $i <= strlen($siret); $i++) {


            if ($i === 3) {
                array_push($result, substr($siret, 0, 3));
                array_push($result, " ");
            } else if ($i === 6) {
                array_push($result, substr($siret, 3, 3));
                array_push($result, " ");
            } else if ($i === 9) {
                array_push($result, substr($siret, 6, 3));
                array_push($result, " ");
            } else if ($i === 14) {
                array_push($result, substr($siret, 9, 5));


            }
        }


        return implode($result);
    }

    public function dateFilter(\DateTime $date = null)
    {

        if (gettype($date) === null) {
            return $date;

        } else {
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

        switch ($typeDB) {
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
            case 'RDV':
                return '<i class="handshake big icon"></i>';
                break;
        }


    }

    public function priorityFilter($priorite)
    {

        switch ($priorite) {
            case 1:
                $tpl = "<div class=\"ui medium red label\">Important</div>";
                return $tpl;
            case 2:
                $tpl = "<div class=\"ui medium orange label\">Normale</div>";
                return $tpl;
            case 3:
                $tpl = "<div class=\"ui medium green label\">Faible</div>";
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

    public function limitLength($word)
    {


        if (strlen($word) >= 30) {
            $chaine = substr($word, 0, 50);

            return $chaine . '.....';
        } else {
            return $word;
        }

    }

    public function formatVille($word)
    {


        $result = strtolower($word);
        return ucwords($result);
    }

    public function userFilter($user)
    {

        switch ($user) {


            case 1:
                return "Laurent";
                break;
            case 2:
                return "Alexis";
                break;
            case 3:
                return "Evelyne";
                break;
            case 4:
                return "Morgane";
                break;
            case 5:
                return "Jibé";
                break;

        }

    }

    public function getAvatar($prenom, $nom, $tiny = false)
    {

        if ($tiny === true) {
            $tpl = "<div class='avatar_background-tiny'><p class='text-avatar-tiny'>" . $prenom[0] . $nom[0] . "</p></div>";
        } else {
            $tpl = "<div class='avatar_background'><p class='text-avatar'>" . $prenom[0] . $nom[0] . "</p></div>";
        }


        return $tpl;
    }

    public function isNumeric($var){


        if (ctype_digit($var)) {
            return true;
        } else {
            return false;
        }
    }

    public function monthIntToString($data){




        switch ($data){

            case '01/17':
                $date = explode("/", $data);
                $result = "Jan " . $date[1];
                return $result;
                break;
            case '02/17':
                $date = explode("/", $data);
                $result = "Fev " . $date[1];
                return $result;
                break;
            case '03/17':
                $date = explode("/", $data);
                $result = "Mars " . $date[1];
                return $result;
                break;
            case '04/17':
                $date = explode("/", $data);
                $result = "Avr " . $date[1];
                return $result;
                break;
            case '05/17':
                $date = explode("/", $data);
                $result = "Mai " . $date[1];
                return $result;
                break;
            case '06/17':
                $date = explode("/", $data);
                $result = "Juin " . $date[1];
                return $result;
                break;
            case '07/17':
                $date = explode("/", $data);
                $result = "Juil " . $date[1];
                return $result;
                break;
            case '08/17':
                $date = explode("/", $data);
                $result = "Aou " . $date[1];
                return $result;
                break;
            case '09/17':
                $date = explode("/", $data);
                $result = "Sept " . $date[1];
                return $result;
                break;
            case '10/17':
                $date = explode("/", $data);
                $result = "Oct " . $date[1];
                return $result;
                break;
            case '11/17':
                $date = explode("/", $data);
                $result = "Nov " . $date[1];
                return $result;
                break;
            case '12/17':
                $date = explode("/", $data);
                $result = "Dec " . $date[1];
                return $result;
                break;


        }







        return $data;



    }

}