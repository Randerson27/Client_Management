<?php

include("conexao.php");

$nome = $_POST["Nome"];
$cpf = $_POST["Cpf"];
$email = $_POST["Email"];
$endereco = $_POST["Endereco"];

$sql = "INSERT INTO clientes (Nome, Cpf, Email, Endereco) VALUE ('$nome', '$cpf', '$email','$endereco')";

if(!isset($_POST['Nome']) || isset($_POST['Cpf']) || isset($_POST['Email']) || isset($_POST['Endereco'])){
    header("location:listar.php");
}

$result = mysqli_query($mysqli,$sql);
mysqli_close($mysqli);


?>