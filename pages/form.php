<?php


  if(isset($_POST['submit']))
  {
      include_once('../db/db.php');
      include_once('../db/functions.php');
  
      $account = new FormDb();
  
      $User = filter_var(trim($_POST['User']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $subtwt = filter_var(trim($_POST['subtwt']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $link = filter_var(trim($_POST['link']), FILTER_SANITIZE_URL);
     
      $singleAcc = $account -> singleAcc($User);
  
      if (!empty($singleAcc['User']))
      {
          header('location: form.php');
      }
      else
      {
          $insertAcc = $account -> InsertAcc($User,$subtwt,$link);
      
          if($insertAcc == true)
          {
              header('location: form.php?sucess');
          }
      
      }   
  }
     
  ?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/iconTopo.png" type="image/png">
    <title>Cadastre-se</title>
    <link rel ="stylesheet" href="../styles/form.css">
</head>
<body>

<?php

if(isset($_GET['exist'])) 
{
    print  "<script>  alert('cpf e/ou email ja existentes')</script>";

}
 if (isset($_GET['sucess']))
{
    print "<script> alert('Formulario enviado com sucesso')</script>";
    header('location: cadCon.php');
}
?>  

<header class="cabecalho">
    <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo do projeto" src="">
        <nav class="navegacao">
           
        <a class="cabecalho-menu" href="../crud/listTwT.php" style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">
       Contas</a>
            <a class= "cabecalho-menu" style= "cursor: default";>|</a>
            <a class= "cabecalho-menu" href="login.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">
 Login</a>
        </nav>
    </header>
    <main class="conteudo">
    <div class="formulario">    
    <div>
        <h1 id="titulo-principal">Registre sua conta :)</h1>
        <p id="subtitulo">Insira suas informacoes</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="user"><strong>user</strong></label>
                <input type="text" name="User" id="User" >
            </div>

            <div class="campo">
                <label for="subtwt" ><strong>subtwt</strong></label>
                <input type="text" name="subtwt" id="subtwt">
            </div>

            <div class="campo">
                <label for="link" ><strong>link do perfil</strong></label>
                <input type="text" name="link" id="link">
            </div>
        </fieldset>

      <button class="botao" type="submit" name="submit"  >Concluir</button>
      
    </form>
    </div>
</main>

    <footer class="rodape">
        <h2 class="desenvolvido">lar bastet</h2>
    </footer>
</body>
</html>