<?php
require_once __DIR__ . "/../config/connect.php";
function register(){
    global $conn;
    if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO userr(username, password)
            values(:username,:password)";
    $stmt = $conn->prepare($sql);
    $stmt -> execute([
        ":username" => $username,
        ":password" => $hash
    ]);
    header("Location: ../form.html/login.html");
    exit;
}
register();
?>