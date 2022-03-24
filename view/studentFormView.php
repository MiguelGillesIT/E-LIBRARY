 <!DOCTYPE html>
    <html>
        <head>
            <title>ETUDIANT | BIBLIO</title>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
            <link rel = "stylesheet" href = "../public/css/navbar.css">
            <link rel="stylesheet" href="../public/css/formStudent.css">
        </head>
        <body>
            <?php require('layout/navbar.php'); ?>
            <div id = "container">
                <form action = "../controller/submitFormStudent.php" method ="post" enctype="multipart/form-data">
                    <div class = "divInput">
                        <h1>Enregistrer un étudiant</h1>
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
                                <?php  unset($_SESSION['success_message']);?>
                            </div>
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
                            <label for = "sexeEtudiant">Sexe</label><br>
                            <select class = "inputField" name="SexeEtudiant" id="sexeEtudiant">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class = "inputContainer divInput">
                        <div class = "divInputElement">
                            <label for = "photoEtudiant">photo de l'étudiant</label><br>
                            <input type = "file" class = "inputField" id = "photoEtudiant" name = "PhotoEtudiant" accept = ".png, .jpg, .jpeg"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "CVEtudiant">CV de l'étudiant</label><br>
                            <input type = "file" class = "inputField" id = "CVEtudiant" name = "CVEtudiant" accept = ".pdf, .docx"><br>
                        </div>
                        <div class = "divInputElement">
                            <label for = "classeEtudiant">classe</label><br>
                            <select class = "inputField" name="ClasseEtudiant" id="classeEtudiant">
                                <?php require("../model/model.php");?>
                                <?php foreach(selectClasse()  as $classe): ?>
                                    <option value = "<?= htmlspecialchars($classe['libelleCl']) ?>" > <?= htmlspecialchars($classe['libelleCl']) ?> </option>
                                <?php endforeach; ?>
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
