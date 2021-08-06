<?php
$op = $_GET['op'];
if($op == 'login'){
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    // $login = 'jamil';
    // $password = 'abc123';

    include 'database/dbCtl.php';
    $a = getLogin($login);
    if($a == 0){
        echo 'err-login';
    }else{
        if(password_verify($password, $a['senha'])){
            echo 'ok';
            $_SESSION['func_id'] = $a['id'];
            $_SESSION['func_nome'] = $a['nome'];
            $_SESSION['func_role'] = $a['cargo'];
        }else{
            echo 'err-pass';
        }
    }
}else if($op == 'logout'){
    session_start();
    session_destroy();
    echo 'ok';
}