<?php
session_start();
if (@$_SESSION['zalogowany']) session_destroy();
header("location:index.php");
?>