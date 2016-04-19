<?php
    session_start();
    $Note_title = $_POST['Note_title'];
    $Note_text = $_POST['Note_text'];
    
    if (!empty($Note_text) && !empty($Note_title))
    {
        $con = new MongoClient();
        $collection = $con -> Notes -> Articles;
        $user = array('user' => $_SESSION["session_name"], 'title' => $Note_title, 'text' => $Note_text);
        $collection -> insert($user);
        $con -> close();
    }
    header('Location: /homepage.php');
?>