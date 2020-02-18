<?
session_start();
if($_GET['session'] == 'destroy')
{
    setcookie('login','', time() - 3600, "/");
    setcookie('email','', time() - 3600, "/");
    setcookie('about','', time() - 3600, "/");
    setcookie('file','', time() - 3600, "/");
    header("Refresh:0; url=/");
}

if(!$_SESSION["USER_LANGUAGE"]) $_SESSION["USER_LANGUAGE"]="en";
$lang_file = "/lang/". $_SESSION['USER_LANGUAGE'] ."/". $_SESSION['USER_LANGUAGE'] .".php";
include $lang_file;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form enter/reg</title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
<div class="wrapper">
    <?

    if($_COOKIE['login'] != "")
    {
        include_once '/view/auth.view.html';
    }
    else
    {
    ?>

    <div id="language">
        <span onclick="javascript:SetLang('ru')" class="ru">
            RU
        </span>
        <span class="separete">
            /
        </span>
        <span onclick="javascript:SetLang('en')" class="en">
            EN
        </span>
    </div>
    <?
    if ($_GET['action'] == 'registr' || !isset($_GET['action']))
    {
        include_once '/view/register.view.html';
    }
    else
    {
            include_once '/view/enter.view.html';
    }
    ?>
    <span class="enter_button">
        <a  href="?action=registr"> <?=$registr_lang;?></a>
        <span class="separete">/</span>
        <a  href="?action=enter"><?=$in;?></a>
    </span>
    <?} ?>

</div>
<script src="view/js/common.js"></script>
</body>
</html>