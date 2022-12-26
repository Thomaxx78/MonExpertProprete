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
?>

<?php 
require 'require/head.php' ;
?>
<body  class="font-Inter">
    <?php require 'require/headeradmin.php' ?>
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
                <div class="flex justify-between items-center flex-row gap-4 p-2 m-2 lg:mx-12 border-solid border-blue-700 border-2">
                    <div>
                        <h2 class="text-blue-700 font-bold text-lg"><?= $element[$gestion . "_title"]; ?></h2>
                        <span class="w-9/12 no-underline"><?= substr($element[$gestion . "_content"], 0, 100); if(strlen($element[$gestion . "_content"])>100){echo '...';};?></span>
                    </div>
                    <div class="flex flex-col justify-between gap-6">
                        <?php
                            if($gestion == "article"){
                                $array_category = [0, "Les détergents", "Les désinfectants", "Les produits détartrants", "Les nettoyants abrasifs"];
                                echo '<span class="text-blue-700 font-bold">Catégorie : ' . $array_category[$element[$gestion . "_category"]] . '</span>';
                            }
                        ?>
                        <div class="flex flex-row w-32 justify-between mr-4 ml-auto">
                            <form method="GET" action="edit.php">
                                <input type="hidden" name="edit_element" value="<?= $element[$gestion . "_id"]; ?>">
                                <input type="hidden" name="gestion" value="<?= $in ?>">
                                <button type="submit"><img class="w-6" src="public/iconAdmin/stylo-plume.png" alt="Icon édition"></button>
                            </form>
                            <form method="POST" action="database/actions.php">
                                <input type="hidden" name="gestion" value="<?= $in ?>">
                                <input type="hidden" name="show_element_id" value="<?= $element[$gestion . "_id"]; ?>">
                                <input type="hidden" name="show_element_bool" value="<?= $element[$gestion . "_show"]; ?>">
                                <button type="submit">
                                    <?php if($element[$gestion . "_show"] == 1){ ?>
                                        <img class="w-6" src="public/iconAdmin/no-video.png" alt="Icon ne pas voir">
                                    <?php } else{ ?>
                                        <img class="w-6" src="public/iconAdmin/oeil.png" alt="Icon voir">
                                    <?php }; ?> 
                                </button>
                            </form>
                            <form method="POST" action="database/actions.php">
                                <input type="hidden" name="gestion" value="<?= $in ?>">
                                <input type="hidden" name="delete_element" value="<?= $element[$gestion . "_id"]; ?>">
                                <button type="submit"><img class="w-6" src="public/iconAdmin/poubelle.png" alt="Icon suppression"></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </section>    
        <div class="flex justify-center my-8">
            <a href="edit.php?gestion=<?= $in?>" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter <?= $genre2 . " " . $gestion?></a>
        </div>
    </main>
    <script src="js/knowDevice.js"></script>
</body>
</html>
