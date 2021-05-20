<?php

namespace App\Traits;

use DateTime;

trait RecruitmentStringTrait {

    public function trimAndExplode($param,$index)
    {
        $string = trim($param,'[]');
        $array = explode(",",$string);
        $output = str_replace('\\','',trim($array[$index],'""'));
        
        return $output;
    }

    public function dateFormat($value)
    {
        $value = date("F j, Y",strtotime($value));

        return $value;
    }

    public function removeDifferenceValue($value)
    {
        $strSplit = explode(" ",$value);
        $startDate = DateTime::createFromFormat('d/m/Y',$strSplit[2]);
        $endDate = DateTime::createFromFormat('d/m/Y',$strSplit[5]);
        $value = $startDate->format('F j, Y') .' - '. $endDate->format('F j, Y');

        return $value;
    }
}