<div class="container w-75">
    <h3 class="text-center">Recepção</h3>
    <div class="d-flex justify-content-center">
        <div class="success hidden">
            <p class='alert alert-success'></p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="error hidden">
            <p class='alert alert-danger'></p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="mx-1">
            <button id="novoCadastro" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="mx-1">
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