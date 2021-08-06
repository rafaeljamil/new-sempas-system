<?php
    $_SESSION['user_nome'] = "";
    $_SESSION['user_cpf'] = "";
    $_SESSION['user_rg'] = "";
    $_SESSION['user_nis'] = "";
    $_SESSION['user_end'] = "";
    $_SESSION['user_setor'] = "";
    $_SESSION['user_atend'] = "";
?>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
 <div class="container w-75">
    <h2 class="text-center">Recepção</h2>
    <div class="row text-center">
        <div class="col">
            <button id="novoCadastro" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="col">
            <button id="buscaCadastro" class="btn btn-primary">Buscar</button>
        </div>
    </div>
    <div class="d-flex justify-content-center my-2">
        <form id="novoCadastroForm" class="form-group w-75 hidden" action="" method="post">
            <input class="form-control my-1" type="text" name="nome" placeholder="Nome" required>
            <input class="form-control my-1" type="text" name="end" placeholder="Endereço" required>
            <div class="row">
                <div class="col">
                    <input class="form-control my-1" type="number" name="rg" placeholder="RG" required>
                </div>
                <div class="col">
                    <input class="form-control my-1" type="number" name="cpf" placeholder="CPF" required>
                </div>
                <div class="col">
                    <input class="form-control my-1" type="number" name="nis" placeholder="NIS" required>
                </div>
            </div>
            <select class="form-control my-1" name="setor"  required>
                <option selected disabled>Setor</option>
                <option value="CRAS">CRAS</option>
                <option value="CREAS">CREAS</option>
                <option value="SEMPAS">SEMPAS</option>
            </select>
            <input class="form-control my-1" type="text" name="atendimento" placeholder="Tipo de Atendimento" required>
            <div>
                <input class="btn btn-primary my-1" type="submit" value="Salvar">
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center my-2">
        <form id="buscaForm" class="form-group w-75 hidden" action="" method="post" accept-charset="UTF-8">
            <input class="form-control my-1" type="text" name="busca" placeholder="Buscar nome, CPF ou NIS">
            <div>
                <input class="btn btn-primary my-1" type="submit" value="Buscar">
            </div>
        </form>
    </div>
    <div id="buscaErro" class="text-center hidden">
    </div>
    <div class="d-flex justify-content-center my-2">
        <form id="buscaResultado" class="form-group w-75 hidden" action="" method="post">
            <fieldset disabled="disabled">
                <input class="form-control my-1" type="text" name="nome">
                <input class="form-control my-1" type="text" name="end">
                <div class="row">
                    <div class="col">
                        <input class="form-control my-1" type="number" name="rg" value="">
                    </div>
                    <div class="col">
                        <input class="form-control my-1" type="number" name="cpf" value="">
                    </div>
                    <div class="col">
                        <input class="form-control my-1" type="number" name="nis" value="">
                    </div>
                </div>
                <select class="form-control my-1" name="setor">
                </select>
                <input class="form-control my-1" type="text" name="atendimento" value="">
            </fieldset>
        </form>
    </div>
 </div>