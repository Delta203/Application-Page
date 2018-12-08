<?php
  $title = "Dein Minecraftserver";

  session_start();

  $mysql_host = "127.0.0.1";
  $mysql_database = "buildplay";
  $mysql_username = "root";
  $mysql_password = "";

  $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
?>
