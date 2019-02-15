<?php include('conexao.php');

    $usuario_f = $_POST['usuario'];
    $senha_f = $_POST['senha'];

    $consulta = "select * from usuarios";
    $query = mysqli_query($conn, $consulta);

    while($ln = mysqli_fetch_array($query)){
        $id = $ln['id'];
        $nome = $ln['nome'];
        $usuario = $ln['usuario'];
        $senha = $ln['senha'];
        $email = $ln['email'];
        $permissao = $ln['permissao'];

        if(isset($_POST['usuario']) AND isset($_POST['senha'])){
            if($usuario_f == $usuario AND $senha_f == $senha){
            $dadosUsuario[] = array('id' => $id, 'nome' => $nome, 'usuario' => $usuario, 'senha' => $senha, 'email' => $email, 'permissao' => $permissao,);

            $_SESSE['dadosUsuario'] = $dadosUsuario;

            ?>
                <!DOCTYPE html>
                    <head>
                        <meta http-equiv="refresh" content="0, url=index.php">
                    </head>
                </html>
            <?php
            }else{
            ?>
                <!DOCTYPE html>
                    <head>
                        <meta http-equiv="refresh" content="0, url=login.php">
                    </head>
                </html>
            <?php
            }
        }
    }
?>