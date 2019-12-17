<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="css/style.css">
        <title>Jean Forteroche, mes écrits en ligne</title>
    </head>
    <body>
        <header class="flex-element column">
            <div> 
                <form method="post" id="login-header">
                    <input type="text" name="nickname" placeholder="Entrez votre nom">
                    <input type="password" name="password">
                </form>
            </div>
            <div class="flex-element main-elements">
                <div id="book-titles" class="titles-menu">Mes écrits</div>
                <div id="logo">Jean Forteroche</div>
                <div id="biography">Mon histoire</div>                       
            </div>

        </header>

        <section id="last-publication">
            <!-- ici apparaît un extrait du dernier article publié. Le titre du chapitre apparaît mais les caractères sont mélangés. -->
        </section>

        <section>
            <!-- ici apparaît le formulaire pour s'identifier, une page de bienvenue personnalisée s'affiche (commencer le code par <?php session_start() ?>)  -->
        </section>
    </body>
</html>
