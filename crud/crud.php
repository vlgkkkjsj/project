<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <title>Crud Administrativo</title>
    <link rel="stylesheet" href="../styles/crud.css">
</head>
<body>
<header class="cabecalho">
        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="?page=novo"> novo Usuario </a>
            <a class="cabecalho-menu"href="?page=listar">Usuarios</a>
        </nav>
    </header>

    <div class="container">
        <div class="titulo-principal">
         <?php
            include("../db/functions.php");
            switch(@$_REQUEST["page"]){
                case "home":
                    print "<script>alert('Bem vindo ao sistema administrativo')</script>";
                    print("Bem vindos! Essa é nossa área somente para administradores, aproveite sua estadia e siga o que seus supervisores manderem");
                break;

                case "novo":
                    include("new_account.php");
                break;
                case "excluir":
                    include("delete.php");
                    break;
                case "editar":
                    include("edir_user.php");
                    break;
                case "listar":
                    include("listar_usuario.php");
                    break;
                case "listar_animais":
                    include("listar_animais.php");
                    break;
                case "listar_empresarial":
                    include("listar_empresarial.php");
                    break; 
            }
            ?>
        </div>
</div>
</body>
</html>