<?php
require "database/connect.php";
?>

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
    <header class="sticky top-0 left-0 bg-white">
        <nav class="py-4 flex row justify-evenly border-solid border-blue-700 border-b-2">
            <a href="admin.php" class="text-blue-700">Modifier la FAQ</a>
            <a href="adminBlog.php">Modifier le blog</a>
        </nav>
    </header>
    <main>
        <div class="my-8 gap-6 flex flex-col">
            <h1 class="font-bold text-2xl text-center">Questions de la FAQ</h1>
            <div class="flex justify-center">
                <a href="editQuestion.php" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter une question</a>
            </div>
        </div>
        <?php
            $recup_questions = $database->prepare("SELECT * FROM questionsfaq");
            $recup_questions->execute();
            $questions = $recup_questions->fetchAll();
        ?>
        <section>
            <?php foreach($questions as $question){ ?>
                <div class="flex justify-center flex-col gap-4 p-2 m-2 border-solid border-blue-700 border-2">
                    <div>
                        <h2 class="text-blue-700 font-bold text-lg"><?= $question["question_title"]; ?></h2>
                        <span class="w-9/12"><?= $question["question_content"]; ?></span>
                    </div>
                    <div class="flex flex-row w-32 justify-between mr-4  ml-auto">
                        <form method="GET" action="editQuestion.php">
                            <input type="hidden" name="edit_question" value="<?= $question["question_id"]; ?>">
                            <button type="submit"><img class="w-6" src="public\iconAdmin\stylo-plume.png" alt=""></button>
                        </form>
                        <form method="POST" action="database/actions.php">
                            <input type="hidden" name="show_question_id" value="<?= $question["question_id"]; ?>">
                            <input type="hidden" name="show_question_bool" value="<?= $question["question_show"]; ?>">
                            <button type="submit">
                                <?php if($question["question_show"] == 1){ ?>
                                    <img class="w-6" src="public\iconAdmin\no-video.png" alt="">
                                <?php } else{ ?>
                                    <img class="w-6" src="public\iconAdmin\oeil.png" alt="">
                                <?php }; ?> 
                            </button>
                        </form>
                        <form method="POST" action="database/actions.php">
                            <input type="hidden" name="delete_question" value="<?= $question["question_id"]; ?>">
                            <button type="submit"><img class="w-6" src="public\iconAdmin\poubelle.png" alt=""></button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </section>    
        <div class="flex justify-center my-8">
            <a href="editQuestion.php" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter une question</a>
        </div>
    </main>
</body>
</html>
