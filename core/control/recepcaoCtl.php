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
    //No código antigo cada dado diferente era passado por sua variável específica,
    //agora apenas um array é passado, contendo todas as informações como valores de
    //suas chaves específicas
    $newUser = [];
    $newUser['func_id'] = $_SESSION['func_id'];
    $newUser['nome'] = $_POST['nome'];
    $newUser['cpf'] = $_POST['cpf'];
    $newUser['rg'] = $_POST['rg'];
    $newUser['nis'] = $_POST['nis'];
    $newUser['end'] = $_POST['end'];
    $newUser['setor'] = $_POST['setor'];
    $newUser['atendimento'] = $_POST['atendimento'];

    include 'database/dbCtl.php';
    $a = setNewUser($newUser);
    if($a === 0){
        echo "err-user ";
    }else{
        echo "ok";
    }
}