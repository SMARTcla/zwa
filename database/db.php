<?php
// file for sql request
// connect to sql
require("connection.php");

// check error
function db_check_error($query){
    $error_info = $query->errorInfo();
    if ($error_info[0] !== PDO::ERR_NONE){
        echo $error_info[2];
        exit();
    }
    return true;
}
// select all from sql table
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i===0){
                $sql = $sql . " WHERE $key=$value"; 
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();

    db_check_error($query);
    return $query->fetchAll();
}
// example params

// $params = [
//     'id' => 1
// ];
// tt(select_one("users", $params));

// select one from sql table with params
function select_one($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if($i===0){
                $sql = $sql . " WHERE $key=$value"; 
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    db_check_error($query);
    return $query->fetch();
}
// insert new value into table 
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
    return $pdo->lastInsertId();
}
function countRow($table){
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    db_check_error($query);
    return $query->fetchColumn();
}


function selectAll_offset($table, $limit, $offset){
    global $pdo;
    $sql = "SELECT * FROM $table LIMIT $limit offset $offset";
    $query = $pdo->prepare($sql);
    $query->execute();

    db_check_error($query);
    return $query->fetchAll();
}


function selectAll_offset_where($table, $limit, $offset, $name_category){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE genre_film = '$name_category'";
    $query = $pdo->prepare($sql);
    $query->execute();

    db_check_error($query);
    return $query->fetchAll();
}

function selectAll_like($table, $like){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE name_film LIKE '%$like%'";
    $query = $pdo->prepare($sql);
    $query->execute();

    db_check_error($query);
    return $query->fetchAll();
}