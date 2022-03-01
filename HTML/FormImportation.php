<?php session_start();?>
<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) :?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>IMPORTATION | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type">
            <link rel ="stylesheet" href = "../CSS/navbar.css">
            <link rel="stylesheet" href="../CSS/FormImportation.css">
        </head>
        <body>
            <?php include_once('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../PHP/ImportEtudiant.php" method ="post" enctype="multipart/form-data">
                    <div class = "divInput">
                        <h1>Importer la liste des etudiants</h1>
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "importedFile"> fichier</label><br>
                        <input type = "file" class = "inputField" id = "importedFile" name = "ImportedFile"><br>
                    </div>
                    <div class = "inputContainer divInput">
                        <label for = "fileType">type de fichier</label><br>
                        <select class = "inputField" name="FileType" id="fileType">
                            <option value="excel">EXCEL</option>
                            <option value="csv">CSV</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    <div class = "divInput">
                        <input type = "submit" value = "Importer"  class = "btn btn-hero-success">
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