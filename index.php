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
<nav class="relative px-4 py-4 flex justify-between items-center bg-white lg:mt-4">
			<a href="" class="lg:ml-16 lg:mr-auto"><img src="public/logo.png" class="lg:h-12" alt=""></a>
            
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-gen-blue p-3">
				<svg class="block h-8 w-8 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden  lg:flex lg:gap-10">
                <li class="text-2xl font-bold">Accueil</li>
                <li class="text-2xl font-bold">Blog</li>
                <li><a href="#" class="bg-gen-blue hover:bg-blue-800 rounded text-white ml-auto mr-4 text-center px-4 py-2 font-bold lg:mr-16 lg:px-5 lg:py-3 lg:text-2xl sm:mr-8">Télécharger</a></li>
            </ul>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
            <a href="" class="w-10/12"><img src="public/logo.png" class="lg:h-12" alt=""></a>
				<button class="navbar-close mr-0 ml-auto">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 text-2xl font-bold" href="#">Accueil</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-2xl font-bold" href="#">Blog</a>
					</li>
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6">
					<a class="block px-2 py-3 mb- text-center text-white font-bold bg-gen-blue text 2xl rounded" href="#">Télécharger</a>
				</div>
			</div>
            <script src="script.js"></script>
		</nav>
</header>
<body class="font-Inter">
    <div class="lg:flex lg:items-center lg:mt-16 sm:flex">
        <div class="flex-col mt-16 ml-4 lg:ml-16 sm:ml-8">
            <h1 class="font-bold text-3xl mr-4 lg:text-6xl lg:w-11/12 sm:w-11/12">Choisir les meilleurs produits d'entretien pour votre santé.</h1>
            <h3 class="mt-2 text-xl mr-4 lg:text-2xl lg:font-bold lg:mt-12 lg:w-10/12 sm:w-10/12">Une application pour scanner vos produits et trouver des bons conseils pour les utiliser.</h3>
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
            <img src="public/logoblanc.png" alt="" class="h-10 lg:h-16">
            <div class="flex flex-row  lg:flex lg:flex-col">
                <div class="flex-col text-white font-semibold gap-8">
                    <h2 class="text-xs">Nous contacter</h2>
                    <h2 class="text-xs">Conditions d'utilisations</h2>
                    <h2 class="text-xs">Règle de confidentalité</h2>
                </div>
                <div class="flex-col right-0">
                    <div class="flex h-4 ml-auto mr-4">
                        <img src="public/fb.png" alt="">
                        <img src="public/tiktok.png" alt="">
                        <img src="public/snap.png" alt="">
                        <img src="public/insta.png" alt="">
                        <img src="public/tumblr.png" alt="">
                    </div>
                <div>
                    <a href="#" class="border-2 text-white border-white rounded w-">Télécharger</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script type="module" src="./main.js"></script>
</body>
</html>
