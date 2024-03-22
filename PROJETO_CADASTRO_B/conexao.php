<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="projeto_cadastro_b";

$conexao =mysqli_connect($hostname,$username,$password,$dbname);//abre a conexão
  
if (mysqli_connect_errno()){
    echo "Falha na conexão:" . mysqli_connect_error();
    exit();
}




?>