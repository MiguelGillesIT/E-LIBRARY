 <!DOCTYPE html>
    <html>
        <head>
            <title>LIVRE | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../public/css/navbar.css">
            <link rel="stylesheet" href="../public/css/bookForm.css">
        </head>
        <body>
            <?php require('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../controller/submitBookForm.php" method ="post">
                    <div class = "divInput">
                        <h1>Enregistrer un livre</h1>
                    </div>
                    <?php if(isset($_SESSION['fail_message'])) : ?>
                        <div  class = "fail_message">
                            <div>
                            <?= $_SESSION['fail_message'] ?>
                            <?php unset($_SESSION['fail_message'])?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['success_message'])) : ?>
                        <div  class = "success_message">
                            <div>
                            <?= $_SESSION['success_message']?>
                            <?php unset($_SESSION['success_message']);?>
                            </div>
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
