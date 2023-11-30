<?php
if($_POST)
{
    include 'config.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sUser=mysqli_real_escape_string($conn,$username);
    $sPass=mysqli_real_escape_string($conn,$password);
    // For Security 
    $query="SELECT * From pass where username='$username' and password='$password'";
    $result=mysqli_query($conn,$query);
    if ($result && mysqli_num_rows($result) == 1)
    {
        session_start();
        $_SESSION['anything']='something';
        header('location:update.html');
    }
	else{
		echo"noooo";
	}
}

?>
