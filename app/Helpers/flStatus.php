<?php

if(!function_exists('flStatus')){
    function flStatus($fl_status){
        return ($fl_status ==  1) ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }
}
