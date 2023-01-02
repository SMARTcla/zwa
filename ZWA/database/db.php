<?php

require("connection.php");


function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function db_check_error($query){
    $error_info = $query->errorInfo();
    if ($error_info[0] !== PDO::ERR_NONE){
        echo $error_info[2];
        exit();
    }
    return true;
}

function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();

    db_check_error($query);
    return $query->fetchAll();
}

function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key=> $value){
        if($i == 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
            
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
            
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    db_check_error($query);
}
// tt(selectAll('users'));

?>
