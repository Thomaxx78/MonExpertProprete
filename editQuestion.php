<?php
require "database/connect.php";

// var_dump($_GET["edit_question"]);

if(isset($_GET["edit_question"])){
    $question_id = $_GET["edit_question"];
    $is_new_question = false;
} else{
    $recup_last_id = $database->prepare("SELECT question_id FROM questionsfaq ORDER BY question_id DESC LIMIT 1");
    $recup_last_id->execute();
    $all_id = $recup_last_id->fetchAll();
    $question_id = $all_id[0]["question_id"] + 1;
    $is_new_question = true;
}

if(!$is_new_question){
    $recup_question = $database->prepare("SELECT * FROM questionsfaq WHERE question_id = :question_id");
    $recup_question->execute(["question_id" => $question_id]);
    $all_content_question = $recup_question->fetchAll();
} else{
    $all_content_question = [["question_title" => "", "question_content" => "", "question_show" => 0]];
}


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
            <a href="gestionFAQ.php">Modifier la FAQ</a>
            <a href="adminBlog.php" class="text-blue-700">Modifier le blog</a>
        </nav>
    </header>
    <main>
        <h1 class="font-bold text-2xl text-center">Ajouter une question</h1>
        <form method="POST" action="database/actions.php" class="flex flex-col gap-4 p-2 m-2">
            <input type="hidden" name="question_id" value="<?= $question_id; ?>">
            <input type="hidden" name="question_new" value="<?= $is_new_question; ?>">
            <label for="question_title" class="w-9/12">Question :</label>
            <input type="text" name="question_title" id="question_title" class="border-solid border-blue-700 border-2" value="<?= $all_content_question[0]["question_title"];?>">
            <label for="question_content" class="w-9/12">Réponse :</label>
            <textarea name="question_content" id="question_content" cols="30" rows="10" class="border-solid border-blue-700 border-2"><?= $all_content_question[0]["question_content"];?></textarea>
            <div class="flex justify-between">
                <label for="question_visible" class="w-9/12">Visible :</label>
                <input type="checkbox" name="question_visible" id="question_visible" class="border-solid border-blue-700 border-2 p-2" <?php if($all_content_question[0]["question_show"]==0){echo 'checked';};?>>
            </div>
            <button type="submit" class="bg-blue-700 px-4 py-2 text-white rounded">Ajouter</button>
        </form>
    </main>
</body>
</html>