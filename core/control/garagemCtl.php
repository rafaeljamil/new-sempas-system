<?php
$op = $_GET['op'];
if ($op == 'nc'){
    session_start();
    $placa = $_POST['placa'];
    $ano = $_POST['ano'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $km = $_POST['km'];
    $func_id = $_SESSION['func_id'];

    include 'database/dbCtl.php';

    $a = newVehicle($func_id, $placa, $ano, $marca, $modelo, $km);
    //echo "<br>".$a."<br>";
    if($a === "ok"){
        echo "ok";
    }else if($a === 0){
        echo "err-vehicle";
    }else if($a === "exists"){
        echo "exists";
    }
}else if($op == 'nr'){
    $kmInicio = $_POST['kmInicio'];
    $kmFim = $_POST['kmFim'];
    $kmTotal = $kmFim - $kmInicio;
    $data = $_POST['data'];
    $hora = $_POST['hora'];
}