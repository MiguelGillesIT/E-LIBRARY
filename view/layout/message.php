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