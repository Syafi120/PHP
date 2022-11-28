<?php
    // array dimensi

    // $nama= array("agus","asep","agung","mutia",100,2.5);
    
    // var_dump($nama);
    // echo '<br>';
    // echo $nama[3];
    // echo '<br>';

    // for ($i=0; $i < 6; $i++) { 
    //     //echo $i.', ';
    //     echo $nama[$i]. '<br>';
    // }
    
    // foreach ($nama as $key) {
    //     echo $key.'<br>';
    // }
    
    // array asosiatif

    $nama=array(
        "bagus" => "surabaya",
        "agus" => "semarang",
        "mutia" => "jakarta",
        "arif" => "sidoarjo"
    );

    $nama["bagus"]="surabaya";
    $nama["agus"]="semarang";
    $nama["mutia"]="jakarta";
    $nama["arif"]="sidoarjo";
    
    
    var_dump($nama);
    echo '<br>';
    //echo $nama['mutia'];
    
    foreach ($nama as $key => $value) {
        echo $key." -> "." ".$value.'<br>';
    }
?>