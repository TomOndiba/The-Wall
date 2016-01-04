<?php
session_start();
require_once('connection.php');
// echo('<h1>$_POST</h1>');
// var_dump($_POST);
// die();
if(isset($_POST))
{
    if($_POST['action'] == 'message')
    {
        $insert_query = "INSERT INTO messages
        (message, created_at, updated_at, user_id) VALUES
        ('{$_POST['place']}', NOW(), NOW(),'{$_POST['user_id']}')";
            run_mysql_query($insert_query);
    }
    else if ($_POST['action'] == 'comment')
    {
        $insert_query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at)
                        VALUES ('{$_POST['message_id']}', '{$_POST['user_id']}','{$_POST['content']}', NOW(), NOW())";

                        run_mysql_query($insert_query);
    }
}
header('location: success.php');
if(isset($_POST['action']) && $_POST['action'] =='register')
{
    register_user($_POST);
}
else if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    login_user($_POST);
}
else 
{
    session_destroy();
    header('location: index.php');
    die();
}
function register_user($post)
{
    $_SESSION['errors'] = array();
    if (empty($_POST['first_name']))
    {
        $_SESSION['errors'][] = "First name can't be blank!";
    }
    if (empty($_POST['last_name']))
    {
        $_SESSION['errors'][] = "Last name can't be blank!";
    }
    if (empty($_POST['password']))
    {
        $_SESSION['errors'][] = "Password can't be blank!";
    }
    if ($_POST['password'] !== $_POST['confirm'])
    {
        $_SESSION['errors'][] = "Your passwords must match!";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['errors'][] = "Enter a valid email address!";
    }
    /////-----------End Validations--------------

    if (count($_SESSION['errors']) > 0)
    {
        header('location:index.php');
        die();
    }
    $query = "INSERT INTO users (first_name, last_name, password, email , created_at, updated_at)
                        VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['password']}', '{$_POST['email']}',
                        NOW(),NOW())";
            run_mysql_query($query);
            $_SESSION['success'] = 'User successfully created';
            header('Location: index.php');
            die();
        
}

function login_user($post)
{
    $query = "SELECT * FROM users WHERE users.password = '{$post['password']}'
            AND users.email = '{$post['email']}'";

        $user = fetch($query);
        if (count($user)> 0)
        {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['first_name']= $user[0]['first_name'];
            $_SESSION['logged_in'] = TRUE;
            header('location:success.php');
        }
        else
        {
            $_SESSION['errors'][] = "Cant find user with those credentials!";
            header('location: index.php');
        }
}


















?>