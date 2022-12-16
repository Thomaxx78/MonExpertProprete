<?php
try {
    $database=new PDO("mysql:host=localhost;dbname=monexpertproprete","root","root", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch(PDOException $error) {
    echo $error;
    die;
}

?>