<?php session_start();?>
<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) :?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>CLASSE | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../CSS/navbar.css">
            <link rel="stylesheet" href="../CSS/FormClasse.css">
        </head>
        <body>
        <?php include_once('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../PHP/SubmitFormClasse.php" method = "post">
                    <div class = "divInput">
                        <h1>Enregistrer une classe</h1>
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
                        <label for = "codeClasse">Code de la Classe</label><br>
                        <input type = "text" class = "inputField" id = "codeClasse" name = "CodeClasse">
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "libelleClasse">Libellé de la classe</label><br>
                        <input type = "text" class = "inputField" id = "libelleClasse" name = "LibelleClasse"><br>
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
        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/unauthorizedAccess.php");
        exit();
    ?>
<?php endif; ?>