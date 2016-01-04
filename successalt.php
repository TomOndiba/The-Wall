<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <title>CODING DOJO WALL</title>
    <meta charset = 'utf-8'>
</head>
<body>
<div class= 'container'>
    <div class= 'header'>
        <h2>Welcome to the Wall</h2>
        <h4><?= ($_SESSION['first_name']); ?></h4>
        <a href= 'index.php'>Log Out</a><hr>
    <form action='process.php' method = 'post'>
        <input type='hidden' name='action' method ='logoff'>
        <input type ='submit' value='logoff'>
    </div>
    <div class = 'messagebox'>
        <h3>Post a message:</h3>
            <form action ='process.php' method = 'post'>
                <textarea name ='content' cols='80' rows='10'>
                </textarea>
                <input type='hidden' name= 'action' value = 'post'>
                <input type='submit' value='Post a Message'>
    </div>
    <div id='messages'>
        <div class = 'message'>
            <p>Nick Ko - August 17, 2015</p>
            <p class ='content'>This is a  first Message!</p>
            <div class = 'comments'>
                <div class ='comment'>
                    <p>Brit Gibo August 16,2015</p>
                    <p class = 'content'>This is a first comment on the first message!</p>
                </div>
                <form action ='process.php' method ='post'>
                    <textarea name = 'content'></textarea>
                    <input type ='hidden' name ='user_id' value = ''>
                    <input type ='hidden' name = 'message_id' value = ''>
                    <input type = 'submit' value 'comment'>
                </form>
            </div>
        </div>
        <div class = 'message'>
            <p>Jason Park - August 15, 2015</p>
            <p class ='content'>This is a second Message!</p>
            <div class = 'comments'>
                <div class ='comment'>
                    <p>Nick Ko August 14,2015</p>
                    <p class = 'content'>This is a second comment on the first message!</p>
                </div>
                <form action ='process.php' method ='post'>
                    <textarea name = 'content'></textarea>
                    <input type ='hidden' name ='user_id' value = ''>
                    <input type ='hidden' name = 'message_id' value = ''>
                    <input type = 'submit' value 'comment'>
                </form>
            </div>
        </div>
        <div class = 'message'>
            <p>KP Hoang - August 13, 2015</p>
            <p class ='content'>This is a third Message!</p>
            <div class = 'comments'>
                <div class ='comment'>
                    <p>Brit Gibo August 12,2015</p>
                    <p class = 'content'>This is a third comment on the first message!</p>
                </div>
                <form action ='process.php' method ='post'>
                    <textarea name = 'content'></textarea>
                    <input type ='hidden' name ='user_id' value = ''>
                    <input type ='hidden' name = 'message_id' value = ''>
                    <input type = 'submit' value 'comment'>
                </form>
            </div>
        </div>
        
        </div>
    </div>
</body>
</html>