<?php
include('../config/constant.php');
//delete all the session and redirect to our loginpage
session_destroy();
header('location:Loginpage.php')
?>