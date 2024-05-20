<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Subs - Melhor grupo de subs </title>
    <link rel="stylesheet" href="../styles/listTwT.css">
</head>
<body>
    <header class="cabecalho">
    <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
    <img class="cabecalho-imagem" src="">
        <nav class="cabecalho-menu">
            <a class="cabecalho-menu-item">Contas </a>
            <a class= "cabecalho-menu-item" style= "cursor: default";>|</a>
            <a class="cabecalho-menu-item"></a>
        </nav>
    </header>

<main class="conteudo">
    <section class="conteudo-principal">
        <div class="conteudo-principal-escrito">
            <h1 class="conteudo-principal-escrito-titulo">The subs</h1>
            <h2 class="conteudo-principal-escrito-subtitulo">Conheca pessoas novas e se divirta</h2>

<?php


include("../db/functions.php");
include ("../db/db.php");

$names = new FormDb(); // Cria uma instância da classe UsuarioDB

$res = $names->listAcc(); // Chama o método ListarUsuarios para obter os usuários

$qtd = count($res); // Obtém a quantidade de usuários

if ($qtd > 0) {
    echo "<table class='table'>";
    echo "<th>ID</th>";
    echo "<th>User da musica</th>";
    echo "<th>Subtwt</th>";
    echo "<th>Link</th>";
   
    
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . $row->getID() . "</td>";
        echo "<td>" . $row->getUser() . "</td>";
        echo "<td>" . $row->getSubtwt() . "</td>";
        echo "<td>" . $row->getLink() . "</td>";
    }
    echo "</table>";
} else {
    echo "<p class='alert alert-danger'>Nenhum cadastro encontrado!!!</p>";
}
?>

</main>
<footer class="rodape">
    <h2 class="desenvolvido">lar bastet</h2>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>


