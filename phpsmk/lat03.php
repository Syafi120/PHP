<?php

    function belajar(){
        echo "saya belajar PHP";
    }
    belajar();
    echo '<br>';

    function luaspersegi($p = 10, $l = 9){
        $luas = $p * $l;
    
        echo $luas;
    }
    luaspersegi();
    echo '<br>';

    function luas($p = 10, $l = 9){
        $luas = $p * $l;
    
        return $luas;
    }
    echo luas();

    function output(){
        return "Belajar function";
    }
    echo '<h1>'.output().'</h1>';
    echo '<br>';
?>