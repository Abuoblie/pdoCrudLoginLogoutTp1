<?php

require_once "handle.php";
$User = new Handle();
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/TpBecode/Assets/style.css">
        <title>Hello, world!</title>
        <title>tp1</title>
</head>

<body>
        <header>
                
                <nav>
                        <a href="/TpBecode/index.php">index</a>
                        <a href="/TpBecode/Assets/addNewUser.php">Add User</a>
                        <?php if (!isset($_SESSION['Firstname'])) {
                                 "<a href='/TpBecode/Assets//login.php'>Login</a>";
                        } else {
                                echo "<a href='/TpBecode/Assets//logout.php'>Logout</a>";
                        }
                        ?>


                </nav>
        </header>
