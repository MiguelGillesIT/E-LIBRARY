<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>BIBLIO | CONNEXION</title>
        <meta charset = "utf-8"/>
        <link rel = "stylesheet" href = "../public/css/connexion.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type"/>
        
    </head>
    <body>
        <div id = "container">
            <form action = "../controller/submitFormConnexion.php" method = "post">
                <div>
                    <h1>CONNEXION</h1>
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