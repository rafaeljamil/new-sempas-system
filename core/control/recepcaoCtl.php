<?php
$op=$_GET['op'];
if($op === 'busca'){
    session_start();
    $busca = $_POST['busca'];

    $_SESSION['user_nome'] = "";
    $_SESSION['user_cpf'] = "";
    $_SESSION['user_rg'] = "";
    $_SESSION['user_nis'] = "";
    $_SESSION['user_end'] = "";
    $_SESSION['user_setor'] = "";
    $_SESSION['user_atend'] = "";
    

    include 'database/dbCtl.php';
    $a = getUser($busca);
    if($a == 0){
        //Se retornar erro o script devolve a string 'err-busca.busca'
        //onde o segundo busca é o termo recebido pelo front sendo passado
        //de novo pra ser mostrado em uma mensagem de erro no front
        echo "err-busca;".$busca;
        
    }else{
        echo $a['nome'].";"
            .$a['rg'].";"
            .$a['cpf'].";"
            .$a['nis'].";"
            .$a['endereco'].";"
            .$a['setor'].";"
            .$a['atendimento'];
    }

}else if($op === 'novo'){
    session_start();
    $func_id = $_SESSION['func_id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $nis = $_POST['nis'];
    $end = $_POST['end'];
    $setor = $_POST['setor'];
    $atendimento = $_POST['atendimento'];

    include 'database/dbCtl.php';
    $a = setNewUser($func_id, $nome, $end, $rg, $cpf, $nis, $setor, $atendimento);
    if($a === 0){
        echo "err-user";
    }else{
        echo "ok";
    }
}