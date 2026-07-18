<?php 
require_once __DIR__ . "/../config/connect.php";
require_once __DIR__ . "/user.php";
if(session_status()=== PHP_SESSION_NONE){
    session_start();
}



function selectInforUser(){
    global $conn;
    $sql = "SELECT * FROM userr";
    $stmt = $conn->query($sql);
    $userList = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $userList[] = new user(
            $row["id"], $row["username"], $row["password"]
        );
    }
    return $userList;
}
function login(){
    if( $_SERVER["REQUEST_METHOD"] === "POST" ){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    }
    $found = false;

    foreach(selectInforUser() as $user){
        if($username == $user->getUsername() && 
            password_verify($password, $user->getPass())
        ){
            $found = true;
            $_SESSION["user"] = $user->getId();
            header("location: ../index.php");
            exit;
        }
        
    }
    if(!$found){
        echo "Tài khoản hoặc mật khẩu không đúng vui lòng nhập lại.";
    }


}
login();
?>