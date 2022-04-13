<?php

include("conexao.php");

$nome = $_POST["Nome"];
$cpf = $_POST["Cpf"];
$email = $_POST["Email"];
$endereco = $_POST["Endereco"];
$data_nasc = $_POST["Data_nasc"];

$sql = "INSERT INTO clientes (Nome, Cpf, Email, Endereco, Data_nasc) VALUE ('$nome', '$cpf', '$email','$endereco', $data_nasc)";

if(!isset($_POST['Nome']) || isset($_POST['Cpf']) || isset($_POST['Email']) || isset($_POST['Endereco']) || isset($_POST["Data_nasc"])){
    header("location:listar.php");
}

$result = mysqli_query($mysqli,$sql);
mysqli_close($mysqli);


?>