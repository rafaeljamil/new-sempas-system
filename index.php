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
<body>
    <h1>Sistema de Gestão SEMPAS</h1>
    <p>Bem-vindo(a), <?php echo $nome; ?></p>
    <p>Visualizando como <?php echo $role; ?></p>
    <a id="logout" href="">Sair</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1">
                <?php include 'core/views/_leftMenu.php'; ?>
            </div>
            <div class="col-lg-11">
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
                            include 'core/views/cadastro.php';
                            break;    
                        case 'ad':
                            include 'core/views/garagem.php';
                            break;                 
                        default:
                            break;
                    }
                }else{
                    echo '<h2>Home</h2>';
                }

                    // if($pg == 'aa'){
                    //     include 'core/views/dashboard.php';
                    // }else{
                    //     return;
                    // }


                ?>
            </div>
        </div>
    </div>
    
</body>
</html>