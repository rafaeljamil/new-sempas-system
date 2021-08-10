<?php
    session_start();
    if(!isset($_SESSION['func_id'])){
        header("location: login.html");
    }
    $nome = $_SESSION['func_nome'];
    $role = $_SESSION['func_role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/styles/bootstrap.css">
    <link rel="stylesheet" href="./public/styles/style.css">
    <script defer src="./public/scripts/jquery-3.6.0.js"></script>
    <script defer src="./public/scripts/bootstrap.js"></script>
    <script defer src="./public/scripts/controller.js"></script>
    <title>SEMPAS</title>
</head>
<body class="bg-light">

    <div class="container-fluid px-4">
        <div class="row bg-light">
            <div class="col-auto">
                <img style="height:12vh; width:auto;" src="public/assets/logo-sempas.png" alt="Logo-sempas">
            </div>
            <div class="col">
                <h2 class="text-center">SiCGest - Sistema de Cadastro e Gestão</h2>
            </div>
            <div class="col-sm-auto text-end mt-2">
                <p>Usuário: <?php echo $nome; ?></p>
                <a class="btn btn-primary" id="logout" href="">Sair</a>
            </div>
        </div>
        <div class="row">
            <div class="col-auto bg-light" >
                <?php include 'core/views/_leftMenu.php'; ?>
            </div>
            <div class="col my-1 overflow-auto" style="border: 2px solid gray; height:75vh; border-radius:20px">
                <?php
                if($_GET['pg']){
                    $pg = $_GET['pg'];
                    switch($pg){
                        case 'aa':
                            include 'core/views/dashboard.php';
                            break;
                        case 'ab':
                            include 'core/views/recepcao.php';
                            break;   
                        case 'ac':
                            include 'core/views/acompanhamento.php';
                            break;    
                        case 'ad':
                            include 'core/views/garagem.php';
                            break;
                        case 'ae':
                            include 'core/views/funcionarios.php';
                            break;                 
                        default:
                            break;
                    }
                }else{
                    echo '<h2>Home</h2>';
                }
                ?>
            </div>
        </div>
        <div class="row bg-light">
            <?php include 'core/views/_footer.php'; ?>
        </div>
    </div>
    
</body>
</html>