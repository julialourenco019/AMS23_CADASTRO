<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>
<body class="container">

<!--  <header>
        <h1>Sistema em php</h1>

    </header>-->

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


    <h1>Cadastro de Clientes<h1>
    <form action="form.php" method="POST"><br>
        <label  class="form-label">Nome:</label><input  class="form-control" type="text" name ="txt_nome"><br>
        <label  class="form-label">Data de Nascimento:</label><input  class="form-control" type="date" name="txt_data_nasci"><br>
        <label  class="form-label">Telefone:</label><input type="text" class="form-control cel-sp-mask" placeholder="Ex.: (00) 00000-0000" name="txt_telefone"><br>
        <label  class="form-label">Data de Cadastro:</label><input  class="form-control"  type="date" name="txt_data_cad"><br>
        <input  class="form-control"  type="submit" value="Cadastrar">
</form>

<?php
 if(count($_POST)>0)
 {
    include('conexao.php');// chamando a programação do arquivo conexao.php
    $nome = $_POST['txt_nome'];
    $data_nasci = $_POST['txt_data_nasci'];
    $telefone = $_POST['txt_telefone'];
    $data_cad = $_POST['txt_data_cad'];

    $sql_inserir = "insert into cliente(cli_nome,cli_data_nasci,cli_telefone,cli_data_cad)
    values ('$nome','$data_nasci','$telefone','$data_cad')";

    $exec_query = mysqli_query($conexao,$sql_inserir);//executa a sql

    if($exec_query)
    {
         echo "cliente cadastrado com sucesso";
    }
    else
    {
        echo " erro ao inserir os dados";
    }

    mysqli_close($conexao);//fecha a conexão
 }

?>
</body>
</html>