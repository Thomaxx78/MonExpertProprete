<?php
require "connect.php";

// Supprimer un élément (article ou question)
if (isset($_POST["delete_element"])){
    $element_id= $_POST["delete_element"];

    $data=[
        "element_id" => htmlspecialchars($element_id)
    ];

    if($_POST["gestion"]=="faq"){
        $delete = $database->prepare("DELETE FROM questionsfaq WHERE question_id = :element_id");
    } else{
        $take_link = $database->prepare("SELECT article_image FROM articlesblog WHERE article_id = :element_id");
        $take_link->execute($data);
        $link = $take_link->fetch();

        $delete = $database->prepare("DELETE FROM articlesblog WHERE article_id = :element_id");

        unlink($link["article_image"]);
    }
    if ($delete->execute($data)){
        header("Location: ../gestion.php?gestion=" . $_POST["gestion"]);
        exit;
    } else{
        echo "Une erreur est survenue lors de la suppression";
    }

// Changer la visibilité d'un élément (article ou question)
} elseif (isset($_POST["show_element_id"])){
    $element_id= $_POST["show_element_id"];

    if($_POST["show_element_bool"] == 1){
        $element_show = 0;
    } else{
        $element_show = 1;
    }

    $data=[
        "element_id" => htmlspecialchars($element_id),
        "element_show" => htmlspecialchars($element_show)
    ];

    if($_POST["gestion"]=="faq"){
        $show = $database->prepare("UPDATE questionsfaq SET question_show = :element_show WHERE question_id = :element_id");
    } else{
        $show = $database->prepare("UPDATE articlesblog SET article_show = :element_show WHERE article_id = :element_id");
    }
    if ($show->execute($data)){
        header("Location: ../gestion.php?gestion=" . $_POST["gestion"]);
        exit;
    } else{
        echo "Une erreur est survenue lors du changement de visibilité";
    }

// Modifier ou ajouter un élément (article ou question)
} elseif (isset($_POST["element_id"])){ 
    if(isset($_POST["element_visible"])){
        $element_visible = 0;
    } else{
        $element_visible = 1;
    }
    if(!$_POST["element_new"]){
        $element_id = $_POST["element_id"];
        $element_title = $_POST["element_title"];
        $element_content = $_POST["element_content"];
    
        $data=[
            "element_id" => htmlspecialchars($element_id),
            "element_title" => htmlspecialchars($element_title),
            "element_content" => $element_content,
            "element_visible" => htmlspecialchars($element_visible)
        ];
    
        if($_POST["gestion"]=="faq"){
            $edit = $database->prepare("UPDATE questionsfaq SET question_title = :element_title, question_content = :element_content, question_show = :element_visible WHERE question_id = :element_id");
        } else{
            $data["element_categorie"] = $_POST["element_categorie"];
            $edit = $database->prepare("UPDATE articlesblog SET article_title = :element_title, article_content = :element_content, article_show = :element_visible, article_categorie = :element_categorie WHERE article_id = :element_id");
        }
        if ($edit->execute($data)){
            header("Location: ../gestion.php?gestion=" . $_POST["gestion"]);
            exit;
        } else{
            echo "Une erreur est survenue lors de la modification";
        }
    } 
    // Ajouter un élément (article ou question)
    else{
        $element_title = $_POST["element_title"];
        $element_content = $_POST["element_content"];

        $data=[
            "element_title" => htmlspecialchars($element_title),
            "element_content" => htmlspecialchars($element_content),
            "element_visible" => htmlspecialchars($element_visible)
        ];

        if($_POST["gestion"]=="faq"){
            $add = $database->prepare("INSERT INTO questionsfaq (question_title, question_content, question_show) VALUES (:element_title, :element_content, :element_visible)");
        } else{
            $data["element_categorie"] = $_POST["element_categorie"];
            $data["element_image_link"] = '../public/imagesArticles/' . $_FILES["element_image"]["name"];
            move_uploaded_file($_FILES["element_image"]["tmp_name"], $data["element_image_link"]);

            $add = $database->prepare("INSERT INTO articlesblog (article_title, article_content, article_show, article_image, article_categorie) VALUES (:element_title, :element_content, :element_visible, :element_image_link, :element_categorie)");
        }
        if ($add->execute($data)){
            header("Location: ../gestion.php?gestion=" . $_POST["gestion"]);
            exit;
        } else{
            echo "Une erreur est survenue lors de l'ajout";
        }
    }

// Se connecter en tant qu'administrateur
} elseif(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $data=[
        "username" => htmlspecialchars($username),
        "password" => htmlspecialchars($password)
    ];

    $login = $database->prepare("SELECT * FROM admins WHERE admin_name = :username AND admin_password = :password");
    if ($login->execute($data)){
        $result = $login->fetch();
        if($result){
            session_start();
            $_SESSION["username"] = $result["admin_name"];
            header("Location: ../gestion.php?gestion=faq");
            exit;
        } else{
            echo "Identifiants incorrects";
        }
    } else{
        echo "Une erreur est survenue lors de la connexion";
    }
} else{
    header("Location: ../admin.php");
    exit;
}

?>