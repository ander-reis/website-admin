<?php

if(!function_exists('customUrl')){
    function customUrl($url){
        //$url_pagina = $this->removeSpecialChars($url);
        $url_pagina = strtolower($url);
        $url_pagina = str_replace(".", '', $url_pagina);
        $url_pagina = str_replace(" ", '-', $url_pagina);
        return $url_pagina;
    }
}