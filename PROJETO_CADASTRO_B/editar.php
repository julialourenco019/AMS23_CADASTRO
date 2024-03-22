<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alteração de Clientes</h1>
    <br>
    <?php
        include('conexao.php');
        $id=intval($_GET['id']);
       
        if(count($_POST)>0){
            $nome=$_POST['txt_nome'];
            $datanasci=$_POST['txt_data_nasci'];
            $telefone=$_POST['txt_telefone'];
            $datacad=$_POST['txt_data_cad'];
            
            $inserir=mysqli_query($conexao,"update cliente set 
            cli_nome='$nome',
            cli_data_nasci='$datanasci',
            cli_telefone='$telefone',
            cli_data_cad='$datacad'
            where cli_id='$id'");

            if($inserir)
            {
                echo "cliente alterado com sucesso! ";
                include('consulta.php');
                exit();
            }
            else
            {
                echo "erro ao alterar cliente";
            }

        }
        

        $localizar_cliente=mysqli_query($conexao,"Select * from cliente where cli_id='$id'");
        if (mysqli_num_rows($localizar_cliente)>0){
            $linha=mysqli_fetch_array($localizar_cliente);

        }
        else{
            echo "cliente não encontrado";
        }

    ?>
    <form action="" method="POST">
        <label  class="form-label">Nome:</label><input  class="form-control" type="text" name="txt_nome" value="<?php echo $linha['cli_nome'];?>"><br>
        <label  class="form-label">Data de Nascimento:</label><input  class="form-control" type="date" name="txt_data_nasci" value="<?php echo $linha['cli_data_nasci'];?>"><br>
        <label  class="form-label">Telefone:</label><input type="text" class="form-control cel-sp-mask"  name="txt_telefone" value="<?php echo $linha['Cli_telefone'];?>"><br>
        <label  class="form-label">Data de Cadastro:</label><input  class="form-control"  type="date" name="txt_data_cad" value="<?php echo $linha['cli_data_cad'];?>"><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>