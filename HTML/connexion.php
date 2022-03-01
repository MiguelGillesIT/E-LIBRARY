<?php session_start();?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>BIBLIO | CONNEXION</title>
        <meta charset = "utf-8"/>
        <link rel = "stylesheet" href = "../CSS/connexion.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type"/>
        
    </head>
    <body>
        <div id = "container">
            <form action = "../PHP/connexionForm.php" method = "post">
                <div>
                    <h1>CONNEXION</h1>
                </div>

                <?php if(isset($_SESSION['message'])) : ?>
                    <div>
                        <?php
                              echo $_SESSION['message'];
                              unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif; ?>

                <div class = "inputContainer">
                    <label for = "login">Login</label><br>
                    <input type = "email" class = "inputField" id = "login" placeholder="e-mail" name = "Login">
                </div>
                <div class = "inputContainer">
                    <label for = "password">Password</label><br>
                    <input type = "password" name = "Password" class = "inputField" id = "password" placeholder="password" ><br>
                </div>
                <div>
                    <input type = "submit" class = "btn btn-hero-success" value = "Se connecter">
                </div>
                
            </form>
        </div>   
    </body>
</html>