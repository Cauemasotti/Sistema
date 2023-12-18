<?php
session_start();


if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit();
}


include 'conexao.php';

$nome = $_POST['nome'];
$data_de_nascimento = $_POST['data_de_nascimento'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];


$sql = "INSERT INTO pessoas (nome, data_nascimento, cpf, sexo, cidade, bairro, rua, numero, complemento)
        VALUES ('$nome', '$data_de_nascimento', '$cpf', '$sexo', '$cidade', '$bairro', '$rua', $numero, '$complemento')";

if ($conn->query($sql) === TRUE) {
    echo "Pessoa cadastrada com sucesso.";
} else {
    echo "Erro ao cadastrar pessoa: " . $conn->error;
}

$conn->close();
?>
