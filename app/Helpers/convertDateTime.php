<?php

if(!function_exists('convertDateTime')){
    function convertDateTime($date, $hour){
        return $date . ' ' . $hour . ':00';
    }
}