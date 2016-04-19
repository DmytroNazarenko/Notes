<?php
    session_start();
    if (isset($_POST["logout"]))
    {
        unset($_SESSION["session_name"]);
        session_destroy();
        header("Location: google.php");
    }
    if (!isset($_SESSION["session_name"]))
    {
        header("Location: registration.php");
        exit();
    }
    echo "<form method='post'  action='homepage.php'>
    <input type='submit' name='logout' value='Logout'>
    </form>";
    echo "User: ".$_SESSION["session_name"];
    echo "<p>Список заметок: </p>";
    
    
    
    $con = new MongoClient();
    $collection = $con -> Notes -> Articles;
    $CurrNote = $collection->find();
    while($document = $CurrNote->getNext()){
        if ($_SESSION["session_name"]== $document["user"])
        {
            echo '<p>Заметка: </p>
                <p>Тема: '.$document["title"].'</p>
                <p>Текст: '.$document["text"].'</p>
                <form method="post"  action="updating.php">
                    <input hidden name="Note_title" value = '.$document["title"].'></input><br>
                <input type="submit" name="submit" value="Delete"></input>    
                </form>';
        }
    }
?>

<html>
<!--
    <form method="post"  action="homepage.php">
    <input type="submit" name="logout" value="Logout">
    </form>
-->
    
    <p>Новая заметка: </p>
    <form method="post"  action="adding.php">
        <input type="text" name="Note_title"></input><br>
        <textarea name = "Note_text"></textarea><br>
    <input type="submit" name="submit" value="Create"></input>    
    </form>
<!--
    <form method="post"  action="updating.php">
        <input type="text" name="Note_title"></input><br>
    <input type="submit" name="submit" value="Delete"></input>    
    </form>
-->
    
</html>