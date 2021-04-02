<?php
session_start();
require_once "Assets/handle.php";
?>
<?php  require_once "Assets/header.php";
?>
<?php 
    if(!isset($_SESSION['Firstname'])){ 
      header("Location:/TpBecode/Assets/login.php");
    }
    else{
      echo "<h3 class='style=\"margin: 0 auto;\"'>welcome {$_SESSION['Firstname']} {$_SESSION['Lastname']}</h3>";
    }

?>

       <table class="table">
         <thead class="thead-dark">
              <tr>							
                 <th cope="col">Firstname</th>
                 <th scope="col">Lastname</th>
                 <th scope="col">Age</th>
                 <th scope="col">Address</th>
                 <th scope="col">PostaleCode</th>
                 <th scope="col">TelephoneNumber</th>
                 <th scope="col">service</th>
                 <th scope="col">delete user</th>
              </tr>
              
              <?php 
                   
                  if (!isset($_POST['submit'])) {
                    $User->getUser(1,1,'tp1');
                  }
                  else{
                      if ($_POST['service'] == 'All') {
                        $User->getUser(1,1,'tp1');
                      }
                      else{ 
                          $User->getUser($_POST['service'],'Name','tp1');  
                      }
                    
                 } 
              ?>
              <?php 
                if(isset($_GET['id'])){
                   
                    $User->delete('tp1',$_GET['id']);       
                }  
              ?>
             
          </thead>
       </table>
       <form action="index.php" method="post">
           <select name="service" id="service">
                <option value="Maintenance">Maintenance</option>
                <option value="Web Developer">Web Developer</option>
                <option value="Web Designer">Web Designer</option>
                <option value="Reference">Reference</option>
                <option value="All" selected ="selected">All</option>
           </select>
           <input type="submit" value="submit" name="submit"> <a href="Assets/addNewUser.php" class="btn btn-primary" role="button">add new user</a>
       </form>

<?php require_once "/TpBecode/Assets/footer.php"?>

