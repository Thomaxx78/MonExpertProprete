<?php
try {
    $database=new PDO("mysql:host=localhost;dbname=monexpertproprete","root","");
} catch(PDOException $error) {
    echo $error;
    die;
}

?>