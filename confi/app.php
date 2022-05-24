<?php
$config = [
    'hostname' => 'localhost' ,
    'username' => 'a',
    'password' => 'a',
    'dbname'   => 'ershad2',
    'port' => '3307'
];


$mysql = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname'] , $config['port']);
// check connection database
if($mysql->error) {
    die($mysql->error);
}
//function
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

?>