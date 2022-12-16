<?php 
$page = 'index';

require 'database/connect.php';
require 'require/head.php' ;
?>

<body class="font-Inter">
    <?php require 'require/header.php';?>
    <div class="lg:flex lg:items-center lg:mt-16 sm:flex">
        <div class="flex-col mt-16 ml-4 lg:ml-16 sm:ml-8">
            <h1 class="font-bold text-3xl mr-4 lg:text-5xl lg:w-11/12 sm:w-11/12">Choisir les meilleurs produits d'entretien pour votre santé.</h1>
            <h3 class="mt-2 text-xl mr-4 lg:text-2xl lg:font-bold lg:mt-12 lg:w-10/12 sm:w-10/12">Une application pour scanner vos produits et trouver des bons conseils pour les utiliser.</h3>
            <div class="flex mt-6 space-x-4 items-center">
                <a href="#" class="download bg-gen-blue hover:bg-blue-800 px-3 py-1 font-bold text-white rounded lg:text-xl lg:py-4 lg:w-3/12 lg:text-center border-2 border-gen-blue">Télécharger</a>
                <a href="#" class="text-gen-blue hover:bg-gen-blue hover:text-white font-bold  border-2 border-gen-blue px-3 py-1 rounded lg:py-4 lg:w-4/12 lg:text-xl lg:text-center">Voir la démo</a>
            </div>
        </div>
        <img src="public/deuxTelBann.png" alt="Visuel de l'application Mon expert propreté" class="ml-auto mr-auto w-10/12 mt-12 lg:mr-16 lg:w-5/12 sm:w-6/12 sm:mr-8">
    </div>
    <div class="lg:flex lg:items-center lg:justify-center lg:space-x-8 sm:ml-8">
        <img src="public/unTelBann.png" alt="Visuel de l'application Mon expert propreté" class="hidden lg:block lg:mt-24 lg:w-5/12">
        <div class="flex-column ml-4 mt-12 lg:w-6/12 lg:ml-0 sm:ml-0">
            <span class="text-4xl font-bold">Fonctionnalités</span>
            <div class="flex mt-6 items-center">
                <img src="public/scan.png" alt="Icon de scan de produit" class="mr-4 h-4 lg:h-6">
                <span class="font-bold lg:text-2xl">Scan les produits de chez toi</span>
            </div>
            <span class="font-normal mr-4 lg:text-lg sm:text-xl">Découvre si les produits que tu utilises sont bons pour toi et pour ta famille.</span>
            <div class="flex mt-6 items-center">
                <img src="public/livre.png" alt="Icon de lecture d'article" class="mr-4 h-5 lg:h-7">
                <span class="font-bold w-8/12 lg:text-2xl ">Trouve des conseils pour bien choisir tes produits</span>
            </div>
            <span class="font-normal mr-4 lg:text-lg sm:text-xl">Apprends des astuces pour gérer les situations qui nécessitent l’utilisation de produit d’entretien.</span>
            <div class="flex mt-6 items-center">
            <img src="public/sauvegarde.png" alt="icon de sauvegarde" class="mr-4 h-5 lg:h-7">
            <span class="font-bold w-8/12 lg:text-2xl ">Sauvegarde tes produits préférés</span>
            </div>
            <span class="font-normal lg:text-lg mr-4 sm:text-xl">Enregistre une liste de produit d’entretien bon pour la santé et qui fonctionne.</span>
        </div>
    </div>
    <div class="ml-4 mt-8 mr-4 flex-column lg:mt-16 lg:ml-16 sm:ml-8 sm:mt-16 lg:mb-16">
        <h2 class="text-2xl font-bold text-gen-blue">FAQ</h2>
        <h2 class="text-3xl font-bold">Questions fréquentes</h2>
        <div class="flex flex-col">
            <?php
                $take_all = $database->prepare("SELECT * FROM questionsfaq WHERE question_show = 0 ORDER BY question_id DESC");
                $take_all->execute();
                $all_questions = $take_all->fetchAll();

                foreach($all_questions as $question){?>
                    <div class="mt-12 text-lg lg:w-6/12">
                        <h2 class="text-gen-blue font-bold"><?=$question['question_title']?></h2>
                        <span><?=$question['question_content']?></span>
                    </div>
            <?php } ?>
        </div>
    </div>
    <div>
        <h2>Derniers articles :</h2>
        <div class="flex flex-col lg:flex-row justify-around">
            <?php
                $take_all = $database->prepare("SELECT * FROM articlesblog WHERE article_show = 0 ORDER BY article_id DESC LIMIT 2");
                $take_all->execute();
                $all_articles = $take_all->fetchAll();

                foreach($all_articles as $article){?>
                    <div class="flex flex-col align-center mt-12 text-lg w-full lg:w-5/12 category_<?= $article["article_category"]?>">
                        <img src="images/<?=$article['article_image']?>" alt="image" class="max-h-48 m-auto object-cover rounded-xl">
                        <h2 class="text-gen-blue font-bold text-center py-4"><?=$article['article_title']?></h2>
                        <section class="text-justify h-2/4 p-2 lg:p-8"><?=substr($article["article_content"], 0, 250)?>...</section>
                        <a href="article.php?id=<?=$article['article_id']?>" class=" bg-gen-blue hover:bg-blue-800 rounded text-white m-2 lg:m-8 mt-4 text-center py-2 font-bold lg:px-5 lg:py-3 lg:text-2xl">Lire la suite</a>
                    </div>
            <?php }?>
        </div>
    </div>

    <?php require 'require/footer.php' ?>   
    <script type="module" src="./main.js"></script>
</body>
</html>
