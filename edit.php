<?php
session_start();
require "database/connect.php";

if (!isset($_SESSION["username"])){
    header("Location: admin.php");
    exit;
}

// Choisir entre blog et faq (par défaut blog) 
if($_GET["gestion"] == "blog"){
    $gestion = "article";
    $in = "blog";
    $genre = "du";
    $genre2 = "un";
} elseif($_GET["gestion"] == "faq"){
    $gestion = "question";
    $in = "faq";
    $genre = "de la";
    $genre2 = "une";
} else{
    header("Location: gestion.php?gestion=faq");
    exit;
}

if(isset($_GET["edit_element"])){
    $content_id = $_GET["edit_element"];
    $is_new_content = false;
} else{
    if($gestion == "question"){
        $recup_all = $database->prepare("SELECT question_id FROM questionsfaq ORDER BY question_id DESC LIMIT 1");
    } else{
        $recup_all = $database->prepare("SELECT article_id FROM articlesblog ORDER BY article_id DESC LIMIT 1");
    }
    $recup_all->execute();
    $all_id = $recup_all->fetchAll();
    $element_id = $all_id[0][$gestion . "_id"] + 1;
    $is_new_content = true;
}

if(!$is_new_content){
    if($gestion == "question"){
        $recup_element = $database->prepare("SELECT * FROM questionsfaq WHERE question_id = :question_id");
    } else{
        $recup_element = $database->prepare("SELECT * FROM articlesblog WHERE article_id = :article_id");
    }
    $recup_element->execute([$gestion . "_id" => $content_id]);
    $all_content = $recup_element->fetchAll();
} else{
    if($gestion == "question"){
        $all_content = [["question_title" => "", "question_content" => "", "question_show" => 0]];
    } else{
        $all_content = [["article_title" => "", "article_content" => "", "article_show" => 0, "article_image" => ""]];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <script src="tiny/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '.tinyText'
    });
    </script>
</head>
<body>
    <header class="sticky top-0 left-0 bg-white">
        <nav class="py-4 flex flex-row justify-evenly items-center lg:justify-between border-solid border-blue-700 border-b-2">
            <a href="index.php" class="hidden lg:block ml-4 w-6/12 lg:w-2/12 lg:ml-16">
                <img src="public/logo.png" alt="Logo MonExpertPropreté">
            </a>
            <div class="py-4 flex row justify-around w-full lg:w-auto lg:gap-24 lg:mx-12">
                <a href="gestion.php?gestion=faq" <?php if($gestion=="question"){echo 'class="text-blue-700"';}?>>Modifier la faq</a>
                <a href="gestion.php?gestion=blog" <?php if($gestion=="article"){echo 'class="text-blue-700"';}?>>Modifier le blog</a>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="font-bold text-2xl text-center mt-12">Ajouter <?= $genre2 . " " . $gestion?></h1>
        <form method="POST" action="database/actions.php" enctype="multipart/form-data" class="flex flex-col gap-4 p-2 m-2">
            <input type="hidden" name="element_id" value="<?= $content_id; ?>">
            <input type="hidden" name="gestion" value="<?= $_GET["gestion"]; ?>">
            <input type="hidden" name="element_new" value="<?= $is_new_content; ?>">
            <label for="element_title" class="w-9/12">Titre :</label>
            <input type="text" name="element_title" id="element_title" class="border-solid border-blue-700 border-2" value="<?= $all_content[0][$gestion . "_title"];?>">
            <label for="element_content" class="w-9/12">Contenu :</label>
            <?php if($_GET["gestion"] == "faq"){
                echo '<textarea name="element_content" id="element_content" cols="30" rows="10" class="border-solid border-blue-700 border-2 resize-none">'; echo $all_content[0][$gestion . "_content"]; echo '</textarea>';
            } else{
                echo '<textarea name="element_content" id="element_content" class="tinyText border-solid border-blue-700 border-2 resize-none">'; echo $all_content[0][$gestion . "_content"]; echo '</textarea>';
                echo '<label for="element_categorie" class="w-9/12">Catégorie de l\'article :</label>';
                echo '<select name="element_categorie" id="element_categorie" class="border-solid border-blue-700 border-2">';
                echo '<option value="1">Catégorie 1</option>';
                echo '<option value="2">Catégorie 2</option>';
                echo '<option value="3">Catégorie 3</option>';
                echo '<option value="4">Catégorie 4</option>';
                echo '</select>';
            }
            // Si on est sur la page blog et que c'est un nouvel article qui est créé, on affiche l'input pour l'image
            if($gestion == "article" AND !isset($_GET["edit_element"])){
                echo '<label for="element_image" class="w-9/12">Image :</label>';
                echo '<input type="file" name="element_image" id="element_image" class="border-solid border-blue-700 border-2">';
            }
            ?>
            <div class="flex justify-between">
                <label for="element_visible" class="w-9/12">Visible :</label>
                <input type="checkbox" name="element_visible" id="element_visible" class="border-solid border-blue-700 border-2 p-2" <?php if($all_content[0][$gestion . "_show"]==0){echo 'checked';};?>>
            </div>
            <button type="submit" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter</button>
        </form>
    </main>
</body>
</html>