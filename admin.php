<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <header>
    <nav class="py-4 flex row justify-evenly border-solid border-blue-700 border-b-2">
        <a href="admin.php" class="text-blue-700">Modifier la FAQ</a>
        <a href="adminBlog.php">Modifier le blog</a>
    </nav>
    </header>
    <main>
        <div class="my-8 gap-6 flex flex-col">
            <h1 class="font-bold text-2xl text-center">Questions de la FAQ</h1>
            <div class="flex justify-center">
                <a href="adminAddQuestion.php" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter une question</a>
            </div>
        </div>
        <?php
            require "database/connect.php";
            $recup_questions = $database->prepare("SELECT * FROM questionsfaq");
            $recup_questions->execute();
            $questions = $recup_questions->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <section>
            <?php foreach($questions as $question){ ?>
                <div class="flex justify-center flex-col gap-4 p-2 m-2 border-solid border-blue-700 border-2">
                    <div>
                        <h2 class="text-blue-700 font-bold text-lg"><?= utf8_encode($question["question_title"]); ?></h2>
                        <span class="w-9/12"><?= $question["question_content"]; ?></span>
                    </div>
                    <div class="flex flex-row w-32 justify-between mr-4  ml-auto">
                        <img class="w-6" src="public\iconAdmin\stylo-plume.png" alt="">
                        <img class="w-6" src="public\iconAdmin\oeil.png" alt="">
                        <img class="w-6" src="public\iconAdmin\poubelle.png" alt="">
                    </div>
                </div>
            <?php }; ?>
        </section>

        <!-- <section id="section_articles" class="affiche_off_3">         Afficher tous les articles
            <php foreach($tables as $article){ >
                <form method="GET" action="article.php" class="suppr_form <= $article["articles_class"];?>">
                    <input type="hidden" name="id_art" value="<= $article["articles_id"]; ?>">
                    <button type="submit" class="bouton_article">
                        <div class="article">
                            <h3><= $article["articles_title"];?></h3>
                            <img src="<= $article["articles_image"];?>" alt="image" class="img_article">
                            <span  class="bouton bouton_form_article">Voir l'article</span>
                            <img src="img/picto_<= $article["articles_class"];?>.png" alt="Pictogramme <= $article["articles_class"];?>" class="picto picto_<= $article["articles_class"];?>">
                        </div>
                    </button>
                </form>
        </section> -->
    </main>
</body>
</html>
