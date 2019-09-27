<?php

if(!function_exists('datetimeUTC')){
    function datetimeUTC($date){
        $date = str_replace('/', '-', $date);
        $date = \Carbon\Carbon::parse($date);

        return $date->format('Y-m-d\TH:i:s');
    }
}
