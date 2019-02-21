<?php

namespace SiteBundle\Twig;


use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig_Function;
use Doctrine\DBAL\Connection;



class CrmFilter extends \Twig_Extension
{

    protected $doctrine;

    /**
     *
     * @var Connection
     */
    private $connection;


    public function __construct(RegistryInterface $doctrine, $dbalConnection)
    {
        $this->doctrine = $doctrine;
        $this->connection = $dbalConnection;


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
            new \Twig_SimpleFilter('ean13', [$this, 'ean13_check_digit']),
            new \Twig_SimpleFilter('centrale_int', [$this, 'centraleStringToInt']),
            new \Twig_SimpleFilter('centraleUrl', [$this, 'centraleUrl']),
        );
    }


    public function centraleStringToInt($centrale){



        $sqlCentrale = "SELECT SO_ID FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_DATABASE = :so_database";
        $stmt = $this->connection->prepare($sqlCentrale);
        $stmt->bindValue('so_database', $centrale);
        $stmt->execute();
        $so_database = $stmt->fetchAll();


        if(!empty($so_database)){
            return $so_database[0]["SO_ID"];
        }else {
            return new \Exception("Probleme pour trouver la centrale");
        }

    }

    public function getClass($class)
    {
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


                $result = $result.$rand;

                break;
            case "CENTRALE_ROC_ECLERC":

                $result .= "ROC-";

                $rand = rand(1, 24);

                for ($i = 0; $i <= 8; $i++) {
                    $rand .= rand(1, 9);
                }
                $result = $result.$rand;
                break;


        }


        return $result;
    }

    public function centraleLabel($centrale)
    {


        $sqlCentrale = "SELECT SO_DATABASE FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :so_database";
        $stmt = $this->connection->prepare($sqlCentrale);
        $stmt->bindValue('so_database', $centrale);
        $stmt->execute();
        $so_database = $stmt->fetchAll();


        if(!empty($so_database)){

            $tpl = "<p class='ui label large yellow '>".$so_database[0]["SO_DATABASE"]."</p>";

            return $tpl;

        }else {
            return new \Exception("Probleme pour trouver la centrale");
        }




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
                    return "www.centrale-".strtolower(substr($centrale, 9));
                    break;
                case 'CENTRALE_ROC_ECLERC':
                    return "www.".strtolower(str_replace("_", "-", $centrale));
                    break;
                case 'ACHAT_CENTRALE':
                    return "secure.achatcentrale";
                    break;
                case 'CENTRALE_PFPL':
                    return "wwww".strtolower(str_replace("_", "-", $centrale));
                    break;
                case 'CENTRALE_GCCP':
                    return "wwww".strtolower(str_replace("_", "-", $centrale));
                    break;
            }
        } else {

            $sqlCentrale = "SELECT SO_DATABASE FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :id";
            $stmt = $this->connection->prepare($sqlCentrale);
            $stmt->bindValue('id', $centrale);
            $stmt->execute();
            $so_database = $stmt->fetchAll();



            if(!empty($so_database)){
                return $so_database[0]["SO_DATABASE"];
            }else {
                return new \Exception("Probleme pour trouver la centrale");
            }




        }


    }

    public function centraleUrl($so_id){

        $sqlCentrale = "SELECT SO_WEB FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :id";
        $stmt = $this->connection->prepare($sqlCentrale);
        $stmt->bindValue('id', $so_id);
        $stmt->execute();
        $so_database = $stmt->fetchAll();


        if(!empty($so_database)){
            return $so_database[0]["SO_WEB"];
        }else {
            return new \Exception("Probleme pour trouver la centrale");
        }

    }

    public function centraleTickets($centrale)
    {

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

        if ($input !== '') {
            return "À remplir";
        } else {
            return $input;
        }

    }

    public function phoneFilter($number)
    {




        if (empty($number)) {
            return "À remplir";
        }else {
            if (strlen($number) == 10) {
                return chunk_split($number, 2, ' ');
            } else {
                return $number;
            }
        }



    }

    public function siretFilter($siret)
    {
        $result = [];

        for ($i = 0; $i <= strlen($siret); $i++) {


            if ($i === 3) {
                array_push($result, substr($siret, 0, 3));
                array_push($result, " ");
            } else {
                if ($i === 6) {
                    array_push($result, substr($siret, 3, 3));
                    array_push($result, " ");
                } else {
                    if ($i === 9) {
                        array_push($result, substr($siret, 6, 3));
                        array_push($result, " ");
                    } else {
                        if ($i === 14) {
                            array_push($result, substr($siret, 9, 5));


                        }
                    }
                }
            }
        }


        return implode($result);
    }

    public function dateFilter($date = null)
    {


        if (gettype($date) === null || gettype($date) === 'string') {
            return $date;
        } else {
            \Moment\Moment::setLocale('fr_FR');

            $m = new \Moment\Moment($date->format('Y-m-d H:i:s'), 'UTC');
            return $m->format('l dS F Y ');
        }
    }

    public function typeFilter($type)
    {

        $em = $this->doctrine->getManager('centrale_achat_jb');

        $typee = $em->getRepository('AchatCentraleCrmBundle:ActionType')->findBy(
            [
                'acId' => $type,
            ]
        );


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

            return $chaine.'.....';
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
            case 13:
                return "Milliana";
                break;

        }

    }

    public function getAvatar($prenom, $nom, $tiny = false, $user = false)
    {

        if ($tiny === true) {
            $tpl = "<div class='avatar_background-tiny'><p class='text-avatar-tiny'>".$prenom[0].$nom[0]."</p></div>";
        } elseif (!$tiny && !$user) {
            $tpl = "<div class='avatar_background'><p class='text-avatar'>".$prenom[0].$nom[0]."</p></div>";
        } elseif ($user === true) {
            $tpl = "<div class='avatar_background-user'><p class='text-avatar'>".$prenom[0].$nom[0]."</p></div>";
        }

        return $tpl;
    }

    public function isNumeric($var)
    {


        if (ctype_digit($var)) {
            return true;
        } else {
            return false;
        }
    }

    public function monthIntToString($data)
    {

        switch ($data) {

            case '01/17':
                $date = explode("/", $data);
                $result = "Jan ".$date[1];

                return $result;
                break;
            case '02/17':
                $date = explode("/", $data);
                $result = "Fev ".$date[1];

                return $result;
                break;
            case '03/17':
                $date = explode("/", $data);
                $result = "Mars ".$date[1];

                return $result;
                break;
            case '04/17':
                $date = explode("/", $data);
                $result = "Avr ".$date[1];

                return $result;
                break;
            case '05/17':
                $date = explode("/", $data);
                $result = "Mai ".$date[1];

                return $result;
                break;
            case '06/17':
                $date = explode("/", $data);
                $result = "Juin ".$date[1];

                return $result;
                break;
            case '07/17':
                $date = explode("/", $data);
                $result = "Juil ".$date[1];

                return $result;
                break;
            case '08/17':
                $date = explode("/", $data);
                $result = "Aou ".$date[1];

                return $result;
                break;
            case '09/17':
                $date = explode("/", $data);
                $result = "Sept ".$date[1];

                return $result;
                break;
            case '10/17':
                $date = explode("/", $data);
                $result = "Oct ".$date[1];

                return $result;
                break;
            case '11/17':
                $date = explode("/", $data);
                $result = "Nov ".$date[1];

                return $result;
                break;
            case '12/17':
                $date = explode("/", $data);
                $result = "Dec ".$date[1];

                return $result;
                break;


        }


        return $data;


    }

    public function ean13_check_digit($digits)
    {




        //first change digits to a string so that we can access individual numbers
        $digits = (string)$digits;
        // 1. Add the values of the digits in the even-numbered positions: 2, 4, 6, etc.
        $even_sum = $digits{1} + $digits{3} + $digits{5} + $digits{7} + $digits{9} + $digits{11};
        // 2. Multiply this result by 3.
        $even_sum_three = $even_sum * 3;
        // 3. Add the values of the digits in the odd-numbered positions: 1, 3, 5, etc.
        $odd_sum = $digits{0} + $digits{2} + $digits{4} + $digits{6} + $digits{8} + $digits{10};
        // 4. Sum the results of steps 2 and 3.
        $total_sum = $even_sum_three + $odd_sum;
        // 5. The check character is the smallest number which, when added to the result in step 4,  produces a multiple of 10.
        $next_ten = (ceil($total_sum / 10)) * 10;
        $check_digit = $next_ten - $total_sum;

        if ($check_digit == substr($digits, -1)){
            return true;
        }else{
            return false;
        }

    }





}