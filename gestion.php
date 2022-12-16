<?php
session_start();
require "database/connect.php";

if (!isset($_SESSION["username"])){
    header("Location: admin.php");
    exit;
}

// Choisir entre blog et faq (par défaut blog) 
if(isset($_GET["gestion"])){
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
        $gestion = "article";
        $in = "blog";
        $genre = "du";
        $genre2 = "un";
    }
} else{
    $gestion = "article";
    $in = "blog";
    $genre = "du";
    $genre2 = "un";
}

if(isset($_GET["deco"])){
    session_destroy();
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'headeradmin.php' ?>
    <main>
        <div class="my-8 gap-6 flex flex-col lg:flex-row lg:justify-between lg:mx-16">
            <h1 class="font-bold text-2xl text-center"><?= ucfirst($gestion)?>s <?= $genre . " " . $in?></h1>
            <div class="flex justify-center">
                <a href="edit.php?gestion=<?= $in?>" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter <?= $genre2 . " " . $gestion?></a>
            </div>
        </div>
        <?php
        if($gestion == "question"){
            $recup_all = $database->prepare("SELECT * FROM questionsfaq ORDER BY question_id DESC");
            $recup_all->execute();
            $all = $recup_all->fetchAll();
        } elseif($gestion == "article"){
            $recup_all = $database->prepare("SELECT * FROM articlesblog ORDER BY article_id DESC");
            $recup_all->execute();
            $all = $recup_all->fetchAll();
        }
        ?>
        <section>
            <?php foreach($all as $element){ ?>
                <div class="flex justify-center flex-col gap-4 p-2 m-2 lg:mx-12 border-solid border-blue-700 border-2">
                    <div>
                        <h2 class="text-blue-700 font-bold text-lg"><?= $element[$gestion . "_title"]; ?></h2>
                        <span class="w-9/12"><?= substr($element[$gestion . "_content"], 0, 100); if(strlen($element[$gestion . "_content"])>100){echo '...';};?></span>
                    </div>
                    <div class="flex flex-row w-32 justify-between mr-4 ml-auto">
                        <form method="GET" action="edit.php">
                            <input type="hidden" name="edit_element" value="<?= $element[$gestion . "_id"]; ?>">
                            <input type="hidden" name="gestion" value="<?= $in ?>">
                            <button type="submit"><img class="w-6" src="public/iconAdmin/stylo-plume.png" alt=""></button>
                        </form>
                        <form method="POST" action="database/actions.php">
                            <input type="hidden" name="gestion" value="<?= $in ?>">
                            <input type="hidden" name="show_element_id" value="<?= $element[$gestion . "_id"]; ?>">
                            <input type="hidden" name="show_element_bool" value="<?= $element[$gestion . "_show"]; ?>">
                            <button type="submit">
                                <?php if($element[$gestion . "_show"] == 1){ ?>
                                    <img class="w-6" src="public/iconAdmin/no-video.png" alt="">
                                <?php } else{ ?>
                                    <img class="w-6" src="public/iconAdmin/oeil.png" alt="">
                                <?php }; ?> 
                            </button>
                        </form>
                        <form method="POST" action="database/actions.php">
                            <input type="hidden" name="gestion" value="<?= $in ?>">
                            <input type="hidden" name="delete_element" value="<?= $element[$gestion . "_id"]; ?>">
                            <button type="submit"><img class="w-6" src="public/iconAdmin/poubelle.png" alt=""></button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </section>    
        <div class="flex justify-center my-8">
            <a href="edit.php?gestion=<?= $in?>" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter <?= $genre2 . " " . $gestion?></a>
        </div>
    </main>
</body>
</html>
