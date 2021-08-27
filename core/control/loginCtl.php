<?php
$op = $_GET['op'];
if($op == 'login'){
    setcookie('login', '');
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    include 'database/dbCtl.php';
    $a = getLogin($login);
    if($a == 0){
        echo 'err-login';
    }else{
        if(password_verify($password, $a['senha'])){
            echo 'ok';
            $nome = $a['nome'];
            setcookie("login", "acessoGarantido", time() + (60*60), '/');

            $_SESSION['func_id'] = $a['id'];
            $_SESSION['func_nome'] = $a['nome'];
            $_SESSION['func_role'] = $a['cargo'];

        }else{
            echo 'err-pass';
        }
    }
}else if($op == 'logout'){
    session_start();
    setcookie("login", "sessãoEncerrada", time() -1, '/');
    session_destroy();
    echo 'ok';
}