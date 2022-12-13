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

} elseif (isset($_POST["show_question_id"])){
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

    $show = $database->prepare("UPDATE questionsfaq SET question_show = :question_show WHERE question_id = :question_id");
    if ($show->execute($data)){
        header("Location: ../admin.php");
        exit;
    } else{
        echo "Une erreur est survenue lors du changement de visibilité";
    }

} elseif (isset($_POST["question_id"])){ 
    if(isset($_POST["question_visible"])){
        $question_visible = 0;
    } else{
        $question_visible = 1;
    }
    if(!$_POST["question_new"]){
        $question_id = $_POST["question_id"];
        $question_title = $_POST["question_title"];
        $question_content = $_POST["question_content"];
    
        $data=[
            "question_id" => $question_id,
            "question_title" => $question_title,
            "question_content" => $question_content,
            "question_visible" => $question_visible
        ];
    
        $edit = $database->prepare("UPDATE questionsfaq SET question_title = :question_title, question_content = :question_content, question_show = :question_visible WHERE question_id = :question_id");
        if ($edit->execute($data)){
            header("Location: ../admin.php");
            exit;
        } else{
            echo "Une erreur est survenue lors de la modification";
        }
    } else{
        $question_title = $_POST["question_title"];
        $question_content = $_POST["question_content"];

        $datar=[
            "question_title" => $question_title,
            "question_content" => $question_content,
            "question_visible" => $question_visible
        ];

        $add = $database->prepare("INSERT INTO questionsfaq (question_title, question_content, question_show) VALUES (:question_title, :question_content, :question_visible)");
        if ($add->execute($datar)){
            header("Location: ../admin.php");
            exit;
        } else{
            echo "Une erreur est survenue lors de l'ajout";
        }
    }
}

?>