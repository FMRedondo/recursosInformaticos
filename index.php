
<?php
include("controller.php");


$controller = new Controller();

if (!isset( $_SESSION['idUser'])) {
   include("views/loginForm.php");

}
