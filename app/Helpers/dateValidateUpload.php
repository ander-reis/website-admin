<?php

if(!function_exists('dateValidateUpload')){
    function dateValidateUpload($string){
        $data = preg_replace("/[^A-Za-z0-9-]/", '_', $string);
        return $data;
    }
}
