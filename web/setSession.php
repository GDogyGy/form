<?php
session_start();
if(isset($_REQUEST['value']))
{

    $_SESSION['USER_LANGUAGE'] = $_REQUEST['value'];
}

function SetLang($p1)
{
    if(!in_array($p1, array('ru','en'))) $p1 = 'ru';
    $_SESSION['USER_LANGUAGE'] = $p1;
}

if(!$_SESSION["USER_LANGUAGE"]) SetLang(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0 ,2));
?>