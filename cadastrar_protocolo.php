<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit();
}

include 'conexao.php';
include 'Controle_de_Protocolo.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $descricao = $_POST["descricao"];
    $data_abertura = $_POST["data_abertura"];
    $prazo = $_POST["prazo"];
    $contribuinte_id = $_POST["contribuinte_id"];

   $Controle_de_Protocolo = new Controle_de_Protocolo();

   $Controle_de_Protocolo->cadastrarprotocolo($descricao, $data_abertura, $prazo, $contribuinte_id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Protocolo</title>
</head>
<body>
    <h1>Cadastrar Protocolo</h1>
    <form action="cadastrar_protocolo.php" method="POST">
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

        <label for="data_abertura">Data de Abertura:</label>
        <input type="date" id="data_abertura" name="data_abertura" required><br><br>

        <label for="prazo">Prazo (em dias):</label>
        <input type="number" id="prazo" name="prazo" required><br><br>

        <label for="contribuinte_id">ID do Contribuinte:</label>
        <input type="number" id="contribuinte_id" name="contribuinte_id" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="listar_protocolos.php">Listar Protocolos</a>
</body>
</html>
