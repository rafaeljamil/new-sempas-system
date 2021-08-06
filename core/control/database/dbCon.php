<?php
    $host = "localhost";
    $bank_user = "root";
    $bank_pswd = "";
    $bank = "sempas_db";
    $con = mysqli_connect($host, $bank_user, $bank_pswd, $bank);
    if (mysqli_connect_errno($con)){
        echo /*"Falha ao conectar no Banco de Dados: " .*/ mysqli_connect_error();
    }else{
        //echo "tudo certo";
    }