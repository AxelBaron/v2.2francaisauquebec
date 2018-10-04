<?php
    // Explode URL
    $url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Get Lang
    $explodedUrl = explode('/', $url);
    if ($explodedUrl[1] == "en") {
        $lang = 'en';
    } else {
        $lang = 'fr';
    }

    $pageKeyForLang = "";
    if(isset($explodedUrl[2])){
        $vars =  get_object_vars($translation->$lang->pageLink);
        foreach ($vars as $key => $val) {
            if ($val == $explodedUrl[2]){
                $pageKeyForLang = $key;
                return;
            }else{
                $pageKeyForLang = 'comic';
            }
        }
    }
?>