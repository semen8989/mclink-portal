<?php

namespace App\Traits;

trait RecruitmentStringTrait {

    public function trimAndExplode($param,$index)
    {
        $string = trim($param,'[]');
        $array = explode(",",$string);
        $output = str_replace('\\','',trim($array[$index],'""'));
        
        return $output;
    }
}