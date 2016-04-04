<?php

$con = new MongoClient();
$collection= $con-> Notes-> Users;
//print_r($collection->findOne());
 $con->close();

$list = $collection->find(); 
echo "<p>Пользователи:</p>";
echo "<table border=1>"; 
echo "<tr><td><b>имя</b></td><td><b>пароль</b></td><td><b>e-mail</b></td></tr>"; 
while($document = $list->getNext()) 
{ 
    echo "<tr><td>".$document["name"]."&nbsp;</td><td>".$document["password"]." 
&nbsp </td><td>".$document["email"]."&nbsp;</td></tr>";  
} 
echo "</table>";

echo "<p>Заметки:</p>";
$article =  $con-> Notes-> Articles->find(); 
echo "<table border=1>"; 
echo "<tr><td><b>Пользователь</b></td><td><b>Тема</b></td><td><b>Текст</b></td></tr>"; 
while($document = $article->getNext()) 
{ 
    echo "<tr><td>".$document["user"]."&nbsp;</td><td>".$document["title"]." 
&nbsp </td><td>".$document["text"]."&nbsp;</td></tr>";  
} 
echo "</table>";
$con->close();

?>