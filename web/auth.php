<?php
session_start();
include_once '../class/Auth.class.php';



$login= $_POST['login'];
$password = $_POST['password'];




$aut = new Auth('',$login,$password,'','');



if($aut->authen())
{


}
else
{
    if($_SESSION['USER_LANGUAGE'] == "en")
    {
        echo 'Authentication fail '. $aut->getErrorMessage();
    }
    else
    {
        echo 'Вход не выполнен так как '. $aut->getErrorMessage();
    }

}





