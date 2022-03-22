<?php
include("conexao.php");

session_start();
  unset($_SESSION['Email']);
  unset($_SESSION['Senha']);
  header('Location:login.php');


?>