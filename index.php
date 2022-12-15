<?php
require "database/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Vite App</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins&display=swap">
</head>
<header class="font-Inter">
    <div class="mt-6 flex items-center">
    <img src="public/logo.png" class="ml-4 w-6/12 lg:w-2/12 lg:ml-16 sm:w-4/12 sm:ml-8" href="index.php">
    <a href="#" class=" bg-gen-blue hover:bg-blue-800 rounded text-white ml-auto mr-4 text-center px-4 py-2 font-bold lg:mr-16 lg:px-5 lg:py-3 lg:text-2xl sm:mr-8">Télécharger</a>
    </div>
</header>
<body class="font-Inter">
    <div class="lg:flex lg:items-center lg:mt-16 sm:flex">
        <div class="flex-col mt-16 ml-4 lg:ml-16 sm:ml-8">
            <h1 class="font-bold text-3xl mr-4 lg:text-6xl lg:w-9/12 sm:w-11/12">Choisir les meilleurs produits d'entretien pour votre santé.</h1>
            <h3 class="mt-2 text-xl mr-4 lg:text-2xl lg:font-bold lg:mt-12 lg:w-7/12 sm:w-10/12">Une application pour scanner vos produits et trouver des bons conseils pour les utiliser.</h3>
            <div class="flex mt-6 space-x-4 items-center">
                <a href="#" class=" bg-gen-blue hover:bg-blue-800 px-3 py-1 font-bold text-white rounded lg:text-xl lg:py-4 lg:w-3/12 lg:text-center border-2 border-gen-blue">Télécharger</a>
                <a href="#" class="text-gen-blue hover:bg-gen-blue hover:text-white font-bold  border-2 border-gen-blue px-3 py-1 rounded lg:py-4 lg:w-4/12 lg:text-xl lg:text-center">Voir la démo</a>
            </div>
        </div>
        <img src="public/deuxTelBann.png" alt="" class="ml-auto mr-auto w-10/12 mt-12 lg:mr-16 lg:w-5/12 sm:w-6/12 sm:mr-8">
    </div>
    <div class="lg:flex lg:items-center lg:justify-center lg:space-x-8 sm:ml-8">
        <img src="public/unTelBann.png" alt="" class="hidden lg:block lg:mt-24 lg:w-5/12">
        <div class="flex-column ml-4 mt-12 lg:w-6/12 lg:ml-0 sm:ml-0">
            <span class="text-4xl font-bold">Fonctionnalités</span>
            <div class="flex mt-6 items-center">
            <img src="public/scan.png" alt="" class="mr-4 h-4 lg:h-6 sm:h-5">
            <span class="font-bold lg:text-2xl sm:text-2xl">Scan les produits de chez toi</span>
            </div>
            <span class="font-normal mr-4 lg:text-lg sm:text-xl">Découvre si les produits que tu utilises sont bons pour toi et pour ta famille.</span>
            <div class="flex mt-6 items-center">
            <img src="public/livre.png" alt="" class="mr-4 h-5 lg:h-7 sm:h-6">
            <span class="font-bold w-8/12 lg:text-2xl sm:text-2xl sm:w-11/12">Trouve des conseils pour bien choisir tes produits</span>
            </div>
            <span class="font-normal mr-4 lg:text-lg sm:text-xl">Apprends des astuces pour gérer les situations qui nécessitent l’utilisation de produit d’entretien.</span>
            <div class="flex mt-6 items-center">
            <img src="public/sauvegarde.png" alt="" class="mr-4 h-5 lg:h-7 sm:h-6">
            <span class="font-bold w-8/12 lg:text-2xl sm:text-2xl">Sauvegarde tes produits préférés</span>
            </div>
            <span class="font-normal lg:text-lg mr-4 sm:text-xl">Enregistre une liste de produit d’entretien bon pour la santé et qui fonctionne.</span>
        </div>
    </div>
    <div class="ml-4 mt-8 mr-4 flex-column lg:mt-16 lg:ml-16 sm:ml-8 sm:mt-16">
        <h2 class="text-2xl font-bold text-gen-blue">FAQ</h2>
        <h2 class="text-3xl font-bold">Questions fréquentes</h2>
        <div class="grid grid-cols-1 lg:grid lg:grid-cols-2 lg:text-start lg:content-center sm:grid sm:grid-cols-2 sm:gap-5">
            <?php
                $take_all = $database->prepare("SELECT * FROM questionsfaq WHERE question_show = 0 ORDER BY question_id DESC");
                $take_all->execute();
                $all_questions = $take_all->fetchAll();

                foreach($all_questions as $question){?>
                    <div class="mt-12 text-lg  lg:ml-16">
                        <h2 class="text-gen-blue font-bold lg:text-8/12 sm:text-xl"><?=$question['question_title']?></h2>
                        <span><?=$question['question_content']?></span>
                    </div>
            <?php } ?>
        </div>
    </div>

    <div class="flex w-12/12 mt-8 bg-gen-blue lg:h-auto">
        <div class="flex-col ml-4 items-center">
            <img src="public/logoblanc.png" alt="" class="h-8 lg:h-16">
            <div class="flex flex-row  lg:flex lg:flex-col">
                <div class="flex-col lg:flex lg:flex-row text-white font-semibold">
                    <h2 class="text-xs">Nous contacter</h2>
                    <h2 class="text-xs">Conditions d'utilisations</h2>
                    <h2 class="text-xs">Règle de confidentalité</h2>
                </div>
                <div class="flex h-4 ml-auto mr-4">
                    <img src="public/fb.png" alt="">
                    <img src="public/tiktok.png" alt="">
                    <img src="public/snap.png" alt="">
                    <img src="public/insta.png" alt="">
                    <img src="public/tumblr.png" alt="">
                </div>
                <a href="admin.php" class="border-2 text-white border-white rounded w-">se connecter</a>
            </div>
        </div>
    </div>
    <script type="module" src="./main.js"></script>
</body>
</html>
