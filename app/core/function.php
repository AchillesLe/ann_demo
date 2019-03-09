<?php 
    function base_url($url="/"){
        $protocol = $_SERVER['REQUEST_SCHEME'];
        $domain =  $_SERVER['HTTP_HOST'];
        echo $protocol."://".$domain."/".$url;
    }
    function get_base_url($url="/"){
        $protocol = $_SERVER['REQUEST_SCHEME'];
        $domain =  $_SERVER['HTTP_HOST'];
        return $protocol."://".$domain."/".$url;
    }