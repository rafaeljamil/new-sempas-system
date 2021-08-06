<div>
    <?php if(in_array($_SESSION['func_role'], ['Administrador'])){echo '<a href="index.php?pg=aa">Dashboard</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Agente'])){echo '<a href="index.php?pg=ab">Recepção</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Agente', 'Psicologo', 'Assistente Social'])){echo '<a href="index.php?pg=ac">Cadastros</a>';} ?>
    <?php if(in_array($_SESSION['func_role'], ['Administrador', 'Motorista'])){echo '<a href="index.php?pg=ad">Garagem</a>';} ?>
</div>