<?php
include "connection.php";
$invalidMessage = '';
if(isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM member_info WHERE name='$username' AND password='$password' ";
    $result = mysqli_query($connection, $sql);

    

    if (!$row=$result->fetch_assoc()) {
        $invalidMessage = "Username or password is invalid";
    }
    else
    {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['login'] = true;

        //echo $row['name'];

        header("Location: ./member.php");
    }
    
}

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <link rel="stylesheet" type="text/css" href="Login_Style.css">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        
        <form method="post" action="index.php">
            <?php if($invalidMessage != '') { ?>
            <div class="alert-danger"><?php echo $invalidMessage; ?></div>
            <?php } ?>
            <div class="txt_field">
                <input name="username"  type="text" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input name="password" type="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <button type="submit" name="login">Login</button>


            <div class="signup_link">
                Not a member? <a href="create_new_account.php">Signup</a>
            </div>
        </form>
    </div>


</body>

</html>