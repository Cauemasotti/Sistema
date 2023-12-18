<?php

$sql = "CREATE TABLE Pessoas (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
data_de_nascimento DATE NOT NULL,
cpf VARCHAR(15) NOT NULL,
sexo CHAR(1) NOT NULL,
cidade VARCHAR(30) NOT NULL,
bairro VARCHAR(30) NOT NULL,
rua VARCHAR(50),
numero INT(5),
complemento VARCHAR(50)
)";

if ($conn->query($mysqli) === TRUE) {
  echo "Tabela Pessoas criada com sucesso";
} else {
  echo "Erro ao criar tabela: " . $conn->error;
}

$sql= "CREATE TABLE Protocolos (
numero INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
descricao TEXT NOT NULL,
data_abertura DATE NOT NULL,
prazo INT(3) NOT NULL,
contribuinte INT(6) UNSIGNED,
FOREIGN KEY (contribuinte) REFERENCES Pessoas(id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabela Protocolo criada com sucesso";
} else {
  echo "Erro ao criar tabela: " . $conn->error;
}

$conn->close();
?>
