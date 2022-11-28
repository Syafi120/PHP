<?php
    // $nama=array('bagas','yanto','mutia',200);

    // var_dump($nama);
    // echo '<br>';
    
    // foreach ($nama as $key) {
    //     echo $key,'<br>';
    // }

    $nama=array(
        "bagas" => "kediri",
        "yanto" => "mojokerto",
        "mutia" => "jakarta"
        
    );

    var_dump($nama);
    echo '<br>';
    
    foreach ($nama as $key => $value) {
        echo $key.' - '.$value;
        echo '<br>';
    }
?>