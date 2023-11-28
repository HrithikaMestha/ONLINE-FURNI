<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$success_message = "";

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'furnituredb');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into register(Username, Email, Password) values(?, ?, ?)");
    $stmt->bind_param("sss",$user,$email, $pass);
    $success_message = "Registration successful";
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
}
 header("Location: main.html?message=" . urlencode($success_message));
    
?>
