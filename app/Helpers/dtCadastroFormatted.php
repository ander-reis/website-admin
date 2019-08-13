<?php

if(!function_exists('dtCadastroFormatted')){
    function dtCadastroFormatted($date){
        return (new \DateTime($date))->format('d/m/Y');
    }
}
