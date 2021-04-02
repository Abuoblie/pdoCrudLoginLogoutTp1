<?php
session_start();

if (!isset($_SESSION['Firstname'])) {
  header("Location:login.php");
}

?>

<?php require_once "header.php"; ?>
<h1>welcome</h1>
<section>
  <form action="addNewUser.php" method="POST">
    <?php
    if (isset($_POST['submit'])) {
      $regex = "/^[\w\s]+$/";
      if (preg_match($regex, $_POST['Firstname']) && preg_match($regex, $_POST['Lastname']) && preg_match($regex, $_POST['Address'])   && preg_match($regex, $_POST['PostaleCode']) && preg_match($regex, $_POST['TelephoneNumber'])) {
        $Firstname = htmlentities(filter_var($_POST['Firstname'], FILTER_SANITIZE_STRING));
        $Lastname = htmlentities(filter_var($_POST['Lastname'], FILTER_SANITIZE_STRING));
        $Address = htmlentities(filter_var($_POST['Address'], FILTER_SANITIZE_STRING));
        $PostaleCode  = htmlentities(filter_var($_POST['PostaleCode'], FILTER_SANITIZE_STRING));
        $TelephoneNumber = htmlentities(filter_var($_POST['TelephoneNumber'], FILTER_SANITIZE_STRING));

        $User->insert('tp1', $Firstname, $Lastname, $_POST['DateOfbirth'], $Address, $PostaleCode, $TelephoneNumber, $_POST['idservice'], $Firstname, $Lastname, $_POST['DateOfbirth']);
        
        exit();
      } else {
        echo " malice element identified";
      }
    } else {
      echo "data not yet submitted";
    }
    ?>
    <fieldset>
      <legend>user info</legend>
      <p><input type="text" name="Firstname" placeholder="Firstname" required="required"></p>
      <p><input type="text" name="Lastname" placeholder="Lastname" required="required"></p>
      <p><input type="date" name="DateOfbirth" placeholder="DateOfbirth" required="required"></p>
      <p><input type="text" name="Address" placeholder="Address" required="required"></p>
      <p><input type="text" name="PostaleCode" placeholder="PostaleCode" required="required"></p>
      <p><input type="telephone" name="TelephoneNumber" placeholder="TelephoneNumber" required="required"></p>
      <p><label>Maintenance</label><input type="radio" name="idservice" placeholder="idservice" required="required" value="1">
       <label> WebDeveloper</label><input type="radio" name="idservice" placeholder="idservice" value="2">
       <label> WebDesigner</label><input type="radio" name="idservice" placeholder="idservice" value="3">
       <label> Reference</label><input type="radio" name="idservice" placeholder="idservice" value="4""></p>
                      <p><button type=" submit" class="btn btn-primary" class="btn" name="submit">Sign in</button></p>
    </fieldset>
  </form>
</section>


<?php 
   require_once "footer.php"; 
?>
