<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    if ($username === "admin" && $password === "admin") {
        $_SESSION["user"] = $username;
        header("Location: Cadastro_Pessoa.html");
        exit();
    } else {
        echo "Credenciais inválidas.";
    }
}
?>
