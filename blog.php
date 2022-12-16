<?php 
$page = 'blog';
require 'require/head.php';
require 'database/connect.php';
?>

<body>
<?php require 'require/header.php';?>
    <main>
        <section class="flex flex-col gap-8">
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
            <div class="flex flex-col align-center mt-12 text-lg  lg:w-4/12 border-solid  border-grey rounded-xl lg:border-2 lg:shadow-lg lg:mb-16 category_<?= $article["article_category"]?>">
                <img src="images/<?=$article['article_image']?>" alt="image" class="rounded-t-xl h-34 lg:h-64  w-12/12">
                <h2 class="font-bold text-center py-4 text-3xl lg:ml-4 lg:mr-4"><?=$article['article_title']?></h2>
                <section class="text-justify h-2/4 p-4 lg:p-4"><?=substr($article["article_content"], 0, 250)?>...</section>
                <a href="article.php?id=<?=$article['article_id']?>" class=" hover:text-blue-900 rounded text-gen-blue lg:m-4 mt-4 text-center py-2 font-bold lg:px-5 lg:py-3 lg:text-xl lg:w-6/12 lg:mr-auto lg:ml-auto">Lire la suite</a>
            </div>
    <?php } ?>
    </section>
    <?php require 'require/footer.php' ?>
    <script src="categorieArticle.js"></script>
    <script src="knowDevice.js"></script>
</body>
</html>