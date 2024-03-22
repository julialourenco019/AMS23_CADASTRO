<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
</head>
<body>
    <h1>Exclusão de Clientes</h1>
    <?php 

      

       
       
     ?>
        


     <form action="excluir.php" method="POST">
    <label>Deseja excluir esse cliente?</label><br><br>
    <label  class="form-label">Nome:</label><input lass="form-control" type="text" name="txt_nome" value="<?php echo $linha['cli_nome'];?>"><br>
    <input type="submit" value="Excluir">
</form>
</body>
</html>