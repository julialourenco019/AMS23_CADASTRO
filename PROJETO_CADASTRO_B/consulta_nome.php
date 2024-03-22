<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Consulta nome</title>
</head>
<body class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sistema em php</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="form.php">Cadastro</a>
            <a class="nav-item nav-link" href="consulta.php">Consulta</a>
            <a class="nav-item nav-link" href="consulta_nome.php">Consulta por nome</a>
          </div>
        </div>
      </nav> 

    <h1  class="text-center">Consulta de Clientes por nome</h1><br>
    <form class="text-center"action="consulta_nome.php" method="POST"> 
        Digite o nome: <input type="text" name="txt_nome">
        <input type="submit" value="Localizar">

</form>
<br>
<?php
    if(count($_POST)>0){
        $nome=$_POST['txt_nome'];
        include('conexao.php');
        $consulta=mysqli_query($conexao,"select * from cliente where upper(cli_nome) like upper ('%$nome%')");
        if(mysqli_num_rows($consulta)>0){
            echo"<table class='table'>";
            echo"<tr>";
                echo"<td>Nome do Cliente</td>";
                echo"<td>Telefone do Cliente</td>";
                echo"<td> Ação Excluir</td>";
                echo"<td> Ação Editar</td>";
            echo"</tr>";
        

      
        while ($linha=mysqli_fetch_array($consulta)) {    
            echo"<tr>";
                echo "<td>".$linha['cli_nome']."</td>";
                echo"<td>".$linha['Cli_telefone']."</td>";
                echo"<td> <a href='editar.php?id={$linha["cli_id"]}'>Editar</a></td>";
                echo"<td> <a href='excluir.php?id={$linha["cli_id"]}'>Excluir</a></td>";

            echo"</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Nenhum cliente encontrado";
    }
        mysqli_close($conexao);
    }
?>


</body>
</html>