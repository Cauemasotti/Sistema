<?php
include 'conexao.php';

$sql = "SELECT * FROM pessoas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
?>
