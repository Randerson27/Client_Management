<?php
include("conexao.php");

//conexao e consulta ao banco para ver se ja existe os parametros 
$nome = mysqli_real_escape_string($mysqli, $_POST["Nome"]);
$email = mysqli_real_escape_string($mysqli, $_POST["Email"]);
$senha = mysqli_real_escape_string($mysqli, $_POST["Senha"]);

$email = strtolower($email);


$query = "SELECT COUNT(*) as total from usuarios WHERE Email = '{$email}' and Senha = '{$senha}'";

if(empty($_POST["Nome"]) || empty($_POST["Email"]) || empty($_POST["Senha"]) || empty($_POST["Confirme_senha"])){
    header("Location:cadastro.php?vazio=true");
    exit;
 }

$result = mysqli_query($mysqli, $query);

$informacao = mysqli_fetch_assoc($result);

if($informacao['total'] == 1){
    header("Location:cadastro.php?erro=true");
    exit;
}

//validação de senha 

if($_POST["Senha"] == $_POST["Confirme_senha"]){

$query = "INSERT INTO  usuarios (Nome, Email, Senha) VALUES ('$nome','$email','$senha')";

$senhaConfirm = mysqli_real_escape_string($mysqli, $_POST["Confirme_senha"]);

if($mysqli->query($query) === TRUE){
    header("Location:cadastro.php?enviado=true");
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();


exit;

 }

 if($_POST["Senha"] != $_POST["Confirme_senha"]){
    header("Location:cadastro.php?incorreto=true");
 }

 



?>