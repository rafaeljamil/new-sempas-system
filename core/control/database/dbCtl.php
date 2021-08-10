<?php
    //Configurando a timezone do servidor
    date_default_timezone_set('America/Belem');
    //LOGIN
    function getLogin($login){
        include 'dbCon.php';

        //proteção contra SQL injection no login, mas a senha passa por hash verify
        //e quebra a sequência de injection
        $a = sprintf("SELECT id, nome, cargo, senha FROM funcionarios WHERE login = '%s'",
            mysqli_real_escape_string($con, $login));
        
        //query antiga vulnerável
        //$query = mysqli_query($con, "SELECT * FROM funcionarios WHERE login = '$login'");
        $query = mysqli_query($con, $a);
        //print_r($query);
        if(!$query){
            return 0;
        }else{
            $return = mysqli_fetch_array($query);
            //print_r($return);
            return $return;
        }
        mysqli_close($con);
    }

    //USERS

    //Busca usuário por nome, nis ou cpf
    function getUser($busca){
        include 'dbCon.php';
        $query = mysqli_query($con, "SELECT nome, rg, cpf, nis, endereco, setor, atendimento 
            FROM usuarios WHERE nome LIKE '%$busca%' 
            OR nis = '$busca'
            OR cpf = '$busca'");
        //return $query;
        if(mysqli_num_rows($query) < 1){
            return 0;
        }else{
            $return = mysqli_fetch_all($query);
            return $return;
        }
        mysqli_close($con);
    }

    //Inclui usuário
    function setNewUser($func_id, $nome, $end, $rg, $cpf, $nis, $setor, $atendimento){
        include 'dbCon.php';
        $date = date('Y-m-d H:i:s');
        $query = mysqli_query($con, "INSERT INTO usuarios 
            (func_id, nome, endereco, rg, cpf, nis, setor, atendimento, data_criacao) 
            VALUES ('$func_id','$nome', '$end', '$rg', '$cpf', '$nis', '$setor', '$atendimento', '$date')");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita usuário

    //Edita nome
    function updateUserName($cpf, $nome){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE users SET 'nome' = '$nome' WHERE 'cpf' = '$cpf'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita endereço
    function updateUserEnd($cpf, $end){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE users SET 'endereco' = '$end' WHERE 'cpf' = '$cpf'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita nis
    function updateUserNis($cpf, $nis){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE users SET 'nis' = '$nis' WHERE 'cpf' = '$cpf'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Visitas
    //Inclui visita
    function setNewVis($id_user, $id_func, $data, $motivo, $setor, $obs, $valor = 0){
        include 'dbCon.php';
        $query = mysqli_query($con, "INSERT INTO visitas 
            (id_usuario, id_funcionario, data, motivo, setor, valor, obs) VALUES
            ('$id_user', '$id_func', '$data', '$motivo', '$setor', '$valor', '$obs')");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita visita
    
    //Edita data
    function updateVisDate($id_visita, $data){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE visitas SET 'data' = '$data' WHERE 'id' = '$id_visita'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita motivo
    function updateVisMotive($id_visita, $motivo){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE visitas SET 'motivo' = '$motivo' WHERE 'id' = '$id_visita'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita setor
    function updateVisSector($id_visita, $setor){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE visitas SET 'setor' = '$setor' WHERE 'id' = '$id_visita'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita observação
    function updateVisObs($id_visita, $obs){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE visitas SET 'observacao' = '$obs' WHERE 'id' = '$id_visita'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //Edita valor
    function updateVisVal($id_visita, $valor){
        include 'dbCon.php';
        $query = mysqli_query($con, "UPDATE visitas SET 'valor' = '$valor' WHERE 'id' = '$id_visita'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }

    //GARAGE

    //Novo Veículo
    function newVehicle($func_id, $placa, $ano, $marca, $modelo, $kmInicial){
        include 'dbCon.php';
        $checkPlate = mysqli_num_rows(mysqli_query($con, "SELECT id FROM veiculos WHERE placa = '$placa'"));
        //print_r($checkPlate);
        if($checkPlate === 0){
            $date = date('Y-m-d');
            $query = mysqli_query($con, 
                "INSERT INTO veiculos 
                (func_id, placa, ano, marca, modelo, km_inicial, data_criacao) VALUES
                ('$func_id', '$placa', '$ano', '$marca', '$modelo', '$kmInicial', '$date')");
            if(!$query){
                //echo "Error: " . $query . "<br>" . mysqli_error($con);
                return 0;
            }else{
                //echo $query;
                //echo "ok";
                return "ok";
            }
        }else{
            //echo "exists";
            return "exists";
        }
    }

    //Encontra veículo pela placa
    function getVehicleByPlate($placa){
        include 'dbCon.php';
        $query = mysqli_query($con, "SELECT id, placa, odometro FROM veiculos WHERE placa = '$placa'");
        if(!$query){
            return 0;
        }else{
            $return = mysqli_fetch_array($query);
            return $return;
        }
    }

    //Encontra todos os veículos
    function getAllVehiclesPlates(){
        include 'dbCon.php';
        $query = mysqli_query($con, "SELECT placa, modelo FROM veiculos");
        return mysqli_fetch_all($query);
        // if(!$query){
        //     return 0;
        // }else{
        //     $return = mysqli_fetch_array($query);
        //     return $return;
        // }
    }

    //Nova Rota
    function newRoute($placa, $kmInicio, $kmFim, $kmTotal, $data, $hora){
        include 'dbCon.php';
        $date = date('Y-m-d');
        $creationDate = $data . " - " . $hora;
        $idVeiculo = getVehicleByPlate($placa)['id'];
        $query = mysqli_query($con, "INSERT IF NOT EXISTS INTO rotas
            (id_veiculo, km_inicial, km_final, km_total, data_hora, data_criacao) VALUES
            ('$idVeiculo', '$kmInicio', '$kmFim', '$kmTotal', '$creationDate', '$date');
            UPDATE veiculos SET odometro = '$kmFim' WHERE id = '$idVeiculo'");
        if(!$query){
            return 0;
        }else{
            return "ok";
        }
    }