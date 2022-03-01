<?php session_start();?>
<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) :?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>LIVRE | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../CSS/navbar.css">
            <link rel="stylesheet" href="../CSS/FormLivre.css">
        </head>
        <body>
            <?php include_once('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../PHP/SubmitFormLivre.php" method ="post">
                    <div class = "divInput">
                        <h1>Enregistrer un livre</h1>
                    </div>
                    <?php if(isset($_SESSION['message'])) : ?>
                        <div  class = "message">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class = "inputContainer divInput">
                        <label for = "codeLivre">Code du livre</label><br>
                        <input type = "text" class = "inputField" id = "codeLivre" name = "CodeLivre">
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "titreLivre">Titre du livre</label><br>
                        <input type = "text" class = "inputField" id = "titreLivre" name = "TitreLivre"><br>
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "auteurLivre">Auteur du livre</label><br>
                        <input type = "text" class = "inputField" id = "auteurLivre" name = "AuteurLivre"><br>
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "genreLivre">Genre du livre</label><br>
                        <input type = "text" class = "inputField" id = "genreLivre" name = "GenreLivre"><br>
                    </div>
                    <div class = "divInput">
                        <input type = "submit" value = "Enregistrer"  class = "btn btn-hero-success">
                    </div>

                </form>
            </div>

        </body>
    </html>
<?php else : ?>
    <?php
        header("Location: http://localhost/BIBLIO/HTML/unauthorizedAccess.php");
        exit();
    ?>
<?php endif; ?>