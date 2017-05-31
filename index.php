<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include("conexao.php");
      $grupo = selectAllPessoa();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Software Engenieering CRUD.</h1>
        <a href="inserir.php">Register</a>       
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birth</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($grupo as $pessoa) { ?>
                    <tr>
                    <td><?=$pessoa["nome"]?></td>
                    <td><?=formatoData($pessoa["nascimento"])?></td>
                    <td><?=$pessoa["telefone"]?></td>
                    <td><?=$pessoa["endereco"]?></td>
                    <td>
                        <form name="alterar" action="alterar.php" method="POST">
                            <input type="hidden" name="id" value=<?=$pessoa["id"]?> />
                            <input type="submit" value="Edit" name="editar" />
                            </form>
                    </td>
                    <td>
                        <form name="excluir" action="conexao.php" method="POST">
                            <input type="hidden" name="id" value="<?=$pessoa["id"]?>" />
                            <input type="hidden" name="acao" value="excluir" />
                            <input type="submit" value="Delete" name="excluir" />
                            </form>
                        
                    </td>
                    </tr>
                 <?php  }
                ?>
            </tbody>
        </table>
        <?php
        // put your code here
        function formatoData($data){
            $array = explode("-", $data);
            // $data = 2016-04-14
            // $array[0]= 2016, $array[1] = 04 e $array[2]= 14;
            $novaData = $array[2]."/".$array["1"]."/".$array[0];
            return $novaData;
        }
        ?>
    </body>
</html>
