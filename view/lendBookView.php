<!DOCTYPE html>
<html lang = "en">
<head>
    <title>LIVRES PRETES | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../public/css/navbar.css">
    <link rel = "stylesheet" href = "../public/css/lends.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require('layout/navbar.php'); ?>
    <div id = "container">
        <form action = "../controller/submitLendBook.php" method ="post">
            <div class = "divInput">
                <h2>Preter un Livre</h2>
            </div>
            <?php if(isset($_SESSION['fail_message'])) : ?>
                <div  class = "fail_message">
                    <div>
                        <?=$_SESSION['fail_message']?>
                        <?php unset($_SESSION['fail_message']);?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['success_message'])) : ?>
                <div  class = "success_message">
                    <div>
                        <?= $_SESSION['success_message'] ?>
                        <?php  unset($_SESSION['success_message']);?>
                    </div>
                </div>
            <?php endif; ?>

            <div class = "inputContainer divInput">
                <div class = "divInputElement">
                    <label for = "etudiant">Etudiant</label><br>
                    <select class = "inputField custom-select" name="Etudiant" id="etudiant">
                        <?php foreach($students  as $student) : ?>
                            <option value = <?= $student['matricule'] ?>> <?= $student['nom']." ".$student['prenoms'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class = "divInputElement">
                    <label for = "book">classe</label><br>
                    <select class = "inputField custom-select" name="Book" id="book">
                        <?php foreach($books  as $book): ?>
                            <option value = <?= $book['codeL'] ?>> <?= $book['titreL'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class = "divInput">
                <input type = "submit" value = "Enregistrer"  class = "btn btn-hero-success">
            </div>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
