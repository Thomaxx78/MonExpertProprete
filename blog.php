<?php
    require "database/connect.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $take_all = $database->prepare("SELECT * FROM articlesblog WHERE article_show = 0 ORDER BY article_id DESC");
    $take_all->execute();
    $all_articles = $take_all->fetchAll();

    foreach($all_articles as $article){?>
        <div class="mt-12 text-lg w-full lg:w-4/12">
            <img src="images/<?=$article['article_image']?>" alt="image" class="w-4/12 object-cover">
            <h2 class="text-gen-blue font-bold"><?=$article['article_title']?></h2>
            <span><?=$article['article_content']?></span>
        </div>
<?php } ?>
</body>
</html>