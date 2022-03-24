<!DOCTYPE html>
<html lang = "en">
<head>
    <title>LIVRES PRETES | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../public/css/navbar.css">
    <link rel = "stylesheet" href = "../public/css/lendNewBook.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  
</head>
<body>
    <?php require('layout/navbar.php'); ?>
    <div id = "container">
        <form action = "../controller/submitLendBook.php" method ="post">
            <div class = "divInput">
                <h1>Preter un Livre</h1>
            </div>
            <?php require('layout/message.php'); ?>
            <?php if(isset($_SESSION['fail_message'])) : ?>
                <div  class = "fail_message">
                    <div>
                        <?= htmlspecialchars(['fail_message'])?>
                        <?php unset($_SESSION['fail_message']);?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['success_message'])) : ?>
                <div  class = "success_message">
                    <div>
                        <?= htmlspecialchars(['success_message']) ?>
                        <?php  unset($_SESSION['success_message']);?>
                    </div>
                </div>
            <?php endif; ?>
            <div class = "inputContainer divInput">
                <div class = "divInputElement">
                    <label for = "etudiant">Etudiant</label><br>
                    <select class = "inputField custom-select" name="Etudiant" id="etudiant">
                        <?php foreach(selectStudent()  as $student) : ?>
                            <option value = <?= htmlspecialchars($student['matricule']) ?>> <?= htmlspecialchars($student['nom'])." ".htmlspecialchars($student['prenoms']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class = "divInputElement">
                    <label for = "book">Livre</label><br>
                    <select class = "inputField custom-select" name="Book" id="book">
                        <?php foreach(selectBook()  as $book): ?>
                            <option value = <?= htmlspecialchars($book['codeL']) ?>> <?= htmlspecialchars($book['titreL']) ?> </option>
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
