<?php session_start();?>
<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) :?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>ETUDIANT | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../CSS/navbar.css">
            <link rel="stylesheet" href="../CSS/FormEtudiant.css">
        </head>
        <body>
            <?php include_once('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../PHP/SubmitFormEtudiant.php" method ="post" enctype="multipart/form-data">
                    <div class = "divInput">
                        <h1>Enregistrer un étudiant</h1>
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
                        <div class = "divInputElement">
                            <label for = "matriculeEtudiant">Matricule de l'étudiant</label><br>
                            <input type = "text" class = "inputField" id = "matriculeEtudiant" name = "MatriculeEtudiant">
                        </div>
                        <div class = "divInputElement">
                            <label for = "nomEtudiant">Nom de l'étudiant</label><br>
                            <input type = "text" class = "inputField" id = "nomEtudiant" name = "NomEtudiant"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "prenomsEtudiant">Prénoms de l'étudiant</label><br>
                            <input type = "text" class = "inputField" id = "prenomsEtudiant" name = "PrenomsEtudiant"><br>
                        </div>
                    </div>

                    <div class = "inputContainer divInput">
                        <div class = "divInputElement">
                            <label for = "dateNaissEtudiant">Date de naissance</label><br>
                            <input type = "date" class = "inputField" id = "dateNaissEtudiant" name = "DateNaissEtudiant"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "lieuNaissEtudiant">Lieu de naissance</label><br>
                            <input type = "text" class = "inputField" id = "lieuNaissEtudiant" name = "LieuNaissEtudiant"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "photoEtudiant">photo de l'étudiant</label><br>
                            <input type = "file" class = "inputField" id = "photoEtudiant" name = "PhotoEtudiant"><br>
                        </div>
                    </div>

                    <div class = "inputContainer divInput">
                        <div class = "divInputElement">
                            <label for = "CVEtudiant">CV de l'étudiant</label><br>
                            <input type = "file" class = "inputField" id = "CVEtudiant" name = "CVEtudiant"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "classeEtudiant">classe</label><br>
                            <select class = "inputField" name="ClasseEtudiant" id="classeEtudiant">
                                <option value="excel">EXCEL</option>
                                <option value="csv">CSV</option>
                                <option value="json">JSON</option>
                            </select>
                        </div>
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