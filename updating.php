<?php
    session_start();
    $Note_title = $_POST['Note_title'];
//    $Note_text = $_POST['Note_text'];
    
//    if (!empty($Note_text) && !empty($Note_title))
//    {
//        $con = new MongoClient();
//        $collection = $con -> Notes -> Articles;
//        $user = array('user' => $_SESSION["session_name"], 'title' => $Note_title, 'text' => $Note_text);
//        $collection -> insert($user);
//        $con -> close();
//    }
    $con = new MongoClient();
    $collection = $con->Notes->Articles;
    $collection->remove( array( 'title' => $Note_title ) );
   // $document = $collection->find;
//    $fruitQuery = array('_id' => '5714d41f84081adc1300002c');
//
//    $document = $collection->find($fruitQuery);
   // $document = db.Articles.find({"_id" : ObjectId($Note_id)});
    
    header('Location: /homepage.php');
?>