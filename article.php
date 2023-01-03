<?php
require 'database/connect.php';
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

$page = 'blog';
require 'require/head.php';
?>
<body>
<?php require 'require/header.php';?>
    <main class="xl:m-24">
        <h1 class="text-center m-auto font-bold text-3xl lg:text-5xl lg:w-9/12 py-16"><?=$article["article_title"]?></h1>
        <div class="px-4 lg:px-64">
            <img src="images/<?=$article["article_image"]?>" alt="image illustrant l'article" class="rounded-2xl m-auto">
            <section class="content-article"><?=htmlspecialchars_decode($article["article_content"])?></section>
            <div class="flex flex-col items-center gap-4 my-12">
                <span class="font-bold m-8">Pour plus d'article rendez-vous sur l'application</span>
                <a href="#" class="download bg-gen-blue hover:bg-blue-800 rounded text-white text-center px-4 py-2 font-bold lg:px-5 lg:py-3 lg:text-2xl">Télécharger</a>
            </div>
        </div>
    </main>
<?php require 'require/footer.php';?>
<script src="js/knowDevice.js"></script>
</body>
</html>