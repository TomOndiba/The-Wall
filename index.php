<?php
session_start();
?>
<!doctype html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="wall.css">
    <title>THE WALL LOGIN</title>
    <meta charset='utf-8'>
</head>
<body>
<style>
body{
    background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Solna_Brick_wall_Stretcher_bond_variation1.jpg/800px-Solna_Brick_wall_Stretcher_bond_variation1.jpg);
}
</style>
<?php
if (isset($_SESSION['errors']))
{
    foreach($_SESSION['errors'] as $error)
    {
        echo "<p class = 'error'>{$error} </p>";
    }
    unset($_SESSION['errors']);
}
if (isset($_SESSION['success']))
{
    echo "<p class= 'winning'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}
    


?>
<div class='container'>

    <div class = 'register'>
        <h2>Register</h2>
        <form = action = 'process.php' method = 'post'>
            <input type= 'hidden' name = 'action' value = 'register'>
            <label>First name:</label>
                <input type= 'text' name ='first_name'><br>
            <label>Last name: </label>
                <input type= 'text' name ='last_name'><br>
            <label>Email Address:</label>
                <input type= 'text' name ='email'><br>
            <label>Password:</label> 
                <input type= 'password' name ='password'><br>
            <label>Confirm Password:</label>
                <input type= 'password' name ='confirm'><br>
            <input type= 'submit' value = 'register'>
        </form>
    </div>
    <div class = 'login'>
        <h2>Login</h2>
        <form action = 'process.php' method = 'post'>
            <input type= 'hidden' name = 'action' value = 'login'>
            Email Address: <input type= 'text' name ='email'><br>
            Password: <input type= 'password' name ='password'><br>
            <input type = 'submit' value= 'register'>
        </form>
    </div>
</div>
</body>
</html>