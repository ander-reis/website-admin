<?php

if(!function_exists('convertDateTime')){
    function convertDateTime($date, $hour){
        $datas = $date . ' ' . $hour;
        return \Carbon\Carbon::parse($datas);
    }
}
