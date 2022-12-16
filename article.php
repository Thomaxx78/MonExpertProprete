<?php
    require "database/connect.php";

    if(isset($_GET["id"])){
        $take_article = $database->prepare("SELECT * FROM articlesblog WHERE article_id = :id");
        $take_article->execute([":id" => $_GET["id"]]);
        $article = $take_article->fetch();
        if(!$article){
            header("Location: blog.php");
            exit;
        }
    } else{
        header("Location: blog.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<header class="font-Inter">
    <div class="mt-6 flex items-center">
    <img src="public/logo.png" class="ml-4 w-6/12 lg:w-2/12 lg:ml-16">
    <a href="#" class="download bg-gen-blue hover:bg-blue-800 rounded text-white ml-auto mr-4 text-center px-4 py-2 font-bold lg:mr-16 lg:px-5 lg:py-3 lg:text-2xl">Télécharger</a>
    </div>
</header>
<body>
    <main>
        <h1 class="text-center m-auto font-bold text-3xl lg:text-5xl lg:w-9/12 py-16"><?=$article["article_title"]?></h1>
        <div class="px-4 lg:px-64">
            <img src="images/<?=$article["article_image"]?>" alt="image illustrant l'article" class="rounded-2xl">
            <section class="content-article"><?=$article["article_content"]?></section>
            <div class="flex flex-col items-center gap-4 my-12">
                <span class="font-bold m-8">Pour plus d'article rendez-vous sur l'application</span>
                <a href="#" class="download bg-gen-blue hover:bg-blue-800 rounded text-white text-center px-4 py-2 font-bold lg:px-5 lg:py-3 lg:text-2xl">Télécharger</a>
            </div>
        </div>
    </main>
    <footer class="flex w-12/12 mt-8 bg-gen-blue">
        <div class="flex-col ml-4 items-center">
            <img src="public/logoblanc.png" alt="" class="h-8">
            <div class="flex">
                <div class="flex-col text-white font-semibold">
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
            </div>
        </div>
    </footer>
    <script src="knowDevice.js"></script>
</body>
</html>