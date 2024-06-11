<?php 
    session_start();
    include "connect.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(!empty($username) && !empty($password) )
        {
            $query = "SELECT * FROM admin WHERE UserName='$username' AND Password='$password'";
            $result = $conn->query($query);
            if($result->num_rows == 1)
            {
                $_SESSION['username'] = $username;
                header('Location: homepage.html'); // Redirect to dashboard
                exit;
            }
            else
            {
                echo "<script type= 'text/javascript'> alert('Incorrect password or username') </script>";
            }
        }
        else
        {
            echo "<script type= 'text/javascript'> alert('Please fill password and username') </script>";
        }

    }
?>