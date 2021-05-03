<?php

namespace App\Traits;

trait RecruitmentStringTrait {

    public function trimAndExplode($param)
    {
        $string = trim($param,'[]');
        $array = explode(",",$string);
        
        return $array;
    }
}