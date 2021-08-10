<div class="d-flex flex-column justify-content-center text-center">
    <?php if(in_array($_SESSION['func_role'], ['Administrador'])){echo '<a class="btn btn-primary my-1" href="index.php?pg=aa">Dashboard</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Agente'])){echo '<a class="btn btn-primary my-1" href="index.php?pg=ab">Recepção</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Psicologo', 'Assistente Social'])){echo '<a class="btn btn-primary my-1" href="index.php?pg=ac">Acompanhamento</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Motorista'])){echo '<a class="btn btn-primary my-1" href="index.php?pg=ad">Garagem</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador'])){echo '<a class="btn btn-primary my-1" href="index.php?pg=ae">Funcionários</a>';} ?>
</div>