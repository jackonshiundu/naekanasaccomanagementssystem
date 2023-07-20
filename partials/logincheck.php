<?php
//checks whether the user is logged in or not
if(!isset($_SESSION['user'])){
    header('location:Loginpage.php');
}
?>