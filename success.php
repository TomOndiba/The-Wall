<?php
session_start();
require_once('connection.php');
$messages_query = "SELECT messages.*, users.first_name, users.last_name 
                FROM messages LEFT JOIN users ON user_id = users.id
                GROUP BY id DESC";

$messages= fetch($messages_query);
// var_dump($messages);



// $comments = fetch($comments_query);

?>

<!doctype html>
<html>
<head>
    <title>CODING DOJO WALL</title>
    <meta charset = 'utf-8'>
<style>
p.content{
    padding-left: 20px;
}
div.comments{
    padding-left: 20px;
}

</style>
</head>
<body>
<div class= 'container'>
    <div class= 'header'>
        <h2>Welcome to the Wall</h2>
        <h4>What's up, <?= ($_SESSION['first_name']); ?>!</h4>
        <a href= 'index.php'>Log Out</a><hr>
    <form action='process.php' method = 'post'>
        <input type='hidden' name='action' method ='logoff'>
        <input type ='submit' value='logoff'>
    </form>
    </div>
    <h3>Post a message:</h3>
        <form action ='process.php' method = 'post'>
            <textarea name ='place' cols='80' rows='10'>
            </textarea>
            <input type='submit' value='Post a Message'>
            <input type='hidden' name= 'action' value = 'message'>
            <input type='hidden' name='user_id' value = '<?= $_SESSION['user_id']; ?>'>
    
        </form>
    <div id = 'messages'>
<?php foreach($messages as $message){
    ?>
        <div class = "message">
            <p><?=$message['first_name']. " ".$message['last_name']; ?> - <?= $message['created_at']; ?></p>
            <p class ='content'><?= $message['message']; ?></p>
            <div class = 'comments'>
<?php   
        $comments_query = "SELECT comments.*, users.first_name, 
            users.last_name FROM comments 
            LEFT JOIN users on user_id=users.id
             WHERE message_id = ".$message['id']." 
             ORDER BY comments.id ASC";
        $comments = fetch($comments_query);
        foreach($comments as $comment){
?>
                <div class ='comment'>
                    <p><?= $comment['first_name']. " ".$comment['last_name']; ?>
                        -<?= $comment['created_at']; ?></p>
                    <p class = 'content'><?= $comment['comment']; ?></p>
                </div>
<?php    }
?>
                <form action ='process.php' method ='post'>
                    <textarea name = 'content'></textarea>
                    <input type ='hidden' name ='action' value = 'comment'> 
                    <input type = 'submit' value 'comment'>
                    <input type ='hidden' name ='user_id' value = '<?=$_SESSION['user_id']; ?>'>
                    <input type ='hidden' name = 'message_id' value = '<?= $message['id']; ?>'>  
                </form>
            </div>
<?php  }
?>          
               
        </div> 

</div>
</body>
</html>