<?php
require 'require/head.php';
?>
<body class="h-full">
    <h1 class="font-bold text-2xl text-center mt-32">Se connecter </h1>
    <form action="database/actions.php" method="POST" class="absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 flex flex-col gap-4 p-2 w-9/12 lg:w-4/12 xl:w-3/12">
        <label for="username">Adresse mail :</label>
        <input type="text" name="username" id="username" class="border-solid border-blue-700 border-2" require>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="border-solid border-blue-700 border-2" require>
        <input type="submit" value="Se connecter" class="bg-blue-700 px-4 py-2 text-white rounded">
    </form>
</body>
</html>