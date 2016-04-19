<?php
    $name = $_POST['login'];
    $p = $_POST['password'];
    $cp = $_POST['cpassword'];
    if (!empty($name) && !empty($p)){
        $con = new MongoClient();
        $collection = $con -> Notes -> Users;
        $checkUser = $collection -> findOne(array('email' => $name));
        if (empty($checkUser))
        {
            if ($p == $cp)
            {
                $user = array('email' => $name, 'password' => md5($p));
                $collection -> insert($user);
            }
            else {
                echo "Пароль не совпадает";
            }
        } else {
            echo "Логин занят";
        }
        $con -> close();
    }

    $Uname = $_POST['ulogin'];
    $Up = $_POST['upassword'];
    if (!empty($Uname) && !empty($Up)){
        
        $con = new MongoClient();
        $collection = $con -> Notes -> Users;
        $user = $collection -> findOne(array('email' => $Uname));
        if (!empty($user))
        {
            
            if ($user['password'] == md5($Up) )
            {
                session_start();
                $_SESSION["session_name"] = $Uname;
                header('Location:/homepage.php');
            } 
            else {
                echo "Пароль не совпадает";
            }
        }
        $con -> close();
    }
?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form method="post" action="registration.php" >
    <input type="email" name="login" placeholder="Введите email" /><br>
    <input type="password" name = "password" placeholder="Пароль"/><br>
    <input type="password" name="cpassword" placeholder="Подтвердите пароль"/><br>
    <input type="submit" name="submit" value="Зарегистрироваться"/>
    </form>
    
    <form method="post" action="registration.php" >
    <input type="email" name="ulogin" placeholder="Введите email" /><br>
    <input type="password" name = "upassword" placeholder="Пароль"/><br>
    <input type="submit" name="submit" value="Войти"/>
    </form>
</body>
    
</html>