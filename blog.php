<?php
    require "database/connect.php";
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
</head>
<body>
    <header class="font-Inter">
        <div class="mt-6 flex items-center">
        <a href="index.php"><img src="public/logo.png" class="ml-4 w-6/12 lg:w-2/12 lg:ml-16">
        <a href="#" class=" bg-gen-blue hover:bg-blue-800 rounded text-white ml-auto mr-4 text-center px-4 py-2 font-bold lg:mr-16 lg:px-5 lg:py-3 lg:text-2xl">Télécharger</a>
        </div>
    </header>
    <section class="flex flex-col gap-8">
        <h1 class="font-bold text-3xl text-center lg:text-4xl">Les conseils de mon expert propreté</h1>
        <div class="flex justify-start gap-8">
            <span>Trier par catégorie :</span>
            <select name="select_category" id="select_category">
                <option value="0">Ne pas trier</option>
                <option value="1">Les détergents</option>
                <option value="2">Les désinfectants</option>
                <option value="3">Les produits détartrants</option>
                <option value="4">Les nettoyants abrasifs</option>
            </select>
        </div>
    </section>
    <section class="flex flex-wrap justify-evenly gap-16">
    <?php
        $take_all = $database->prepare("SELECT * FROM articlesblog WHERE article_show = 0 ORDER BY article_id DESC");
        $take_all->execute();
        $all_articles = $take_all->fetchAll();

        foreach($all_articles as $article){?>
            <div class="flex flex-col align-center mt-12 text-lg w-full lg:w-5/12 category_<?= $article["article_category"]?>">
                <img src="images/<?=$article['article_image']?>" alt="image" class="max-h-48 m-auto object-cover rounded-xl">
                <h2 class="text-gen-blue font-bold text-center py-4"><?=$article['article_title']?></h2>
                <section class="text-justify h-2/4 p-2 lg:p-8"><?=substr($article["article_content"], 0, 250)?>...</section>
                <a href="article.php?id=<?=$article['article_id']?>" class=" bg-gen-blue hover:bg-blue-800 rounded text-white m-2 lg:m-8 mt-4 text-center py-2 font-bold lg:px-5 lg:py-3 lg:text-2xl">Lire la suite</a>
            </div>
    <?php } ?>
    </section>
    <script src="categorieArticle.js"></script>
</body>
</html>