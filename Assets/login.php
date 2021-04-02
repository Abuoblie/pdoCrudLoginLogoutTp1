<?php
session_start();
require_once "header.php";
?>
<section>
        <?php
        if (isset($_POST['submit'])) {

                $User->Login('tp1', $_POST['Firstname'], $_POST['Lastname']);
        }
        ?>
        <form action="login.php" method="POST">
                <fieldset>
                        <legend>login</legend>
                        <p><input type="text" name="Firstname" placeholder="Firstname" required="required"></p>
                        <p><input type="text" name="Lastname" placeholder="Lastname" required="required"></p>

                        <p><button type="submit" class="btn btn-primary" class="btn" name="submit">Sign in</button></p>
                </fieldset>
        </form>
</section>

<?php
require_once "footer.php";
?>