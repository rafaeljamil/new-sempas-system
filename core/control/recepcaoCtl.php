<?php
$op=$_GET['op'];
if($op === 'busca'){
    session_start();
    $busca = $_POST['busca'];

    include 'database/dbCtl.php';
    $a = getUser($busca);
    if($a == 0){
        //Se retornar erro o script devolve a string 'err-busca.busca'
        //onde o segundo busca é o termo recebido pelo front sendo passado
        //de novo pra ser mostrado em uma mensagem de erro no front
        echo json_encode("err-busca");
        
    }else{
        echo json_encode($a);
        //OLD CODE
        // //Se encontrar algum usuário converte o array pra string,
        // //separa de novo no script jQuery e posiciona no campo de busca
        // echo $a['nome'].";"
        //     .$a['rg'].";"
        //     .$a['cpf'].";"
        //     .$a['nis'].";"
        //     .$a['endereco'].";"
        //     .$a['setor'].";"
        //     .$a['atendimento'];
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