<?php
    session_start();
    
    $usuario_autenticado = false;
    $usuario_id = null;
    
    $usuarios_app = array(
        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => 'abcd'),
        array('id' => 3,'email' => 'maria@teste.com.br', 'senha' => 'abcd'),
        array('id' => 4,'email' => 'jose@teste.com.br', 'senha' => 'abcd'),
    );

    $perfis = array(1 => 'administrativo', 2 => 'Usuário');
    print_r($_POST);

    
    echo '<pre>';
    print_r($usuarios_app);

    foreach($usuarios_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
        }
    }

    if($usuario_autenticado){
        echo 'usuario autenticado';
        $_SESSION['autenticado'] = 'sim';
        $_SESSION['id'] = $usuario_id;
        header('Location: home.php');
    }else{
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'não';
    }
   
?>