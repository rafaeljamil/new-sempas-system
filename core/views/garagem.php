<div class="container w-75">
    <h2 class="text-center">Garagem</h2>
    <div class="row text-center">
        <div class="col">
            <button id="novoCarro" class="btn btn-primary my-2 mx-2" >Novo Carro</button>
        </div>
        <div class="col">
            <button id="novaRota" class="btn btn-primary my-2 mx-2" >Nova Rota</button>
        </div>
    </div>

    
    <div class="d-flex justify-content-center my-2">
        <form id="novoCarroForm" class="hidden form-group w-50" action="" method="post">
            <input class="form-control" type="text" name="placa" placeholder="Placa">
            <input class="form-control" type="text" name="ano" placeholder="Ano">
            <input class="form-control" type="text" name="marca" placeholder="Marca">
            <input class="form-control" type="text" name="modelo" placeholder="Modelo">
            <input class="form-control" type="number" name="km" placeholder="Quilometragem">
            <input class="btn btn-primary my-2" type="submit" value="Salvar">
        </form>
    </div>

    <div class="d-flex justify-content-center my-2">
        <form id="novaRotaForm" class="hidden form-group w-50" action="" method="post">
            <select class="form-control" name="veiculo">
                <?php 
                    include './core/control/database/dbCtl.php';
                    $vehicles = getAllVehiclesPlates();
                    if(!$vehicles){
                        echo "<option value='blank'>blank</option>";
                    }else if(is_array($vehicles)){
                        $count = sizeof($vehicles);
                        for($i = 0; $i < $count; $i++){
                            echo "<option value='".$vehicles[$i][0]."'>".$vehicles[$i][0]."</option>";
                        }
                    }
                ?>
            </select>
            <input class="form-control" type="number" name="kmInicio" placeholder="KM de Início">
            <input class="form-control" type="number" name="kmFinal" placeholder="KM de Fim">
            <input class="form-control" type="date" name="data" placeholder="Data">
            <input class="form-control" type="number" name="hora" placeholder="Hora">
            <input class="btn btn-primary my-2" type="submit" value="Salvar">
        </form>
    </div>
</div>