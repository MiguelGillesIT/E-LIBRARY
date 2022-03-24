<!DOCTYPE html>
    <html>
        <head>
            <title>CLASSE | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../public/css/navbar.css">
            <link rel="stylesheet" href="../public/css/classeForm.css">
        </head>
        <body>
        <?php require('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../controller/submitFormClass.php" method = "post">
                    <div class = "divInput">
                        <h1>Enregistrer une classe</h1>
                    </div>
                    <?php require('layout/message.php'); ?>
                    <?php if(isset($_SESSION['fail_message'])) : ?>
                        <div  class = "fail_message">
                            <div>
                            <?= htmlspecialchars($_SESSION['fail_message']) ?>
                            <?php unset($_SESSION['fail_message']);?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['success_message'])) : ?>
                        <div  class = "success_message">
                            <div>
                            <?= htmlspecialchars($_SESSION['success_message']) ?>
                            <?php unset($_SESSION['success_message']);?>
                            </div>
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