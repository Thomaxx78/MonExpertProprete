<?php
require "connect.php";

if (isset($_POST["delete_question"])){
    $question_id= $_POST["delete_question"];

    $donnees=[
        "question_id" => $question_id
    ];

    $delete = $database->prepare("DELETE FROM questionsfaq WHERE question_id = :question_id");
    if ($delete->execute($donnees)){
        header("Location: ../admin.php");
        exit;
    } else{
        echo "Une erreur est survenue lors de la suppression";
    }

} else if (isset($_POST["show_question_id"])){
    $question_id= $_POST["show_question_id"];

    if($_POST["show_question_bool"] == 1){
        $question_show = 0;
    } else{
        $question_show = 1;
    }

    $data=[
        "question_id" => $question_id,
        "question_show" => $question_show
    ];

    $edit = $database->prepare("UPDATE questionsfaq SET question_show = :question_show WHERE question_id = :question_id");
    if ($edit->execute($data)){
        header("Location: ../admin.php");
        exit;
    } else{
        echo "Une erreur est survenue lors de la suppression";
    }

}

?>