<?php
session_start();
include_once '../class/UserCreate.class.php';


$email = $_POST['email'];
$login= $_POST['login'];
$password = $_POST['password'];
$about = $_POST['about'];
$file = $_FILES['userfile'];



$acc = new UserCreate($email,$login,$password,$about,$file);



if($acc->register())
{
    if($_SESSION['USER_LANGUAGE'] == "en")
    {
        echo 'Registration complete';
    }
    else
    {
        echo 'Регистрация прошла успешно!';
    }

}
else
{
    if($_SESSION['USER_LANGUAGE'] == "en")
    {
        echo 'Registration fail '. $acc->getErrorMessage();
    }
    else
    {
        echo 'Регистрация не завершилась так как '. $acc->getErrorMessage();
    }

}




