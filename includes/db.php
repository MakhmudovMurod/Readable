<?php

// more advanced way of connecting to database
/*
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'cms';

    foreach($db as $key => $value)
    {
        define(strtoupper($key),$value);
    }

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    */

global $connection;

$connection = mysqli_connect('127.0.0.1', 'root', '', 'cms');

//if ($connection) {
//    echo "Connected";
//} else {
//   echo "DB not connected";
//}
