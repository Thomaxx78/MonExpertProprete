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
<body>
    <h1><?=$article["article_title"]?></h1>
    <img src="images/<?=$article["article_image"]?>" alt="image illustrant l'article">
    <section><?=$article["article_content"]?></section>
</body>
</html>