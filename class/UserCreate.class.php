<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 30.01.2020
 * Time: 18:43
 */
include_once '../class/DB.class.php';

class UserCreate
{
        public $email_class;
        public $login_class;
        public $password_class;
        public $about_class;
        public $file_class;
        public $maxLengthLogin;
        public $minLengthLogin;
        public $maxLengthPassword;
        public $minLengthPassword;
        public $error_message;
        public $notcorrectsymbol;
        public $file_path;
        function __construct($email,$login,$password,$about,$file)
        {
            $this->email_class = trim(htmlspecialchars($email));
            $this->login_class = trim(htmlspecialchars($login));
            $this->password_class = trim(htmlspecialchars($password));
            $this->about_class = trim(htmlspecialchars($about));
            $this->file_class = $file;
            $this->maxLengthLogin = 12;
            $this->minLengthLogin = 6;
            $this->maxLengthPassword = 32;
            $this->minLengthPassword = 12;
            $this->error_message = "";
            $this->notcorrectsymbol = "!@\"#№;$%^:&?*()-_+=//|\\`.,";
            $this->file_path = "";

        }

        public function register() // основная функция регистрации
        {

            if($this->checkLoginDB())
            {
                $this->error_message = "Логин занят другим пользователем";
                return false;
            }
            else
            {
                if ($this->checkLogin())
                {
                    if ($this->checkPassword())
                    {
                        if ($this->checkEmail())
                        {
                            if ($this->checkFile())
                            {
                                if ($this->addAccountDB())
                                {
                                    return true;
                                }
                                else
                                {
                                    $this->error_message = "Аккаунт не был создан. Свяжитесь с Администрацией сайта";
                                    return false;
                                }

                            }
                            else
                            {
                                $this->error_message = "Некорректный file. Разрешенные расширения gif, jpg, png.";
                                return false;
                            }
                        }
                        else
                        {
                            $this->error_message = "Некорректный email";
                            return false;
                        }
                    }
                    else
                    {
                        $this->error_message = "Для пароля использованы некорректные символы ".$this->notcorrectsymbol;
                        return false;
                    }
                }
                else
                {
                    $this->error_message = "Логин должен быть длиннее: ". $this->minLengthLogin ." символов и короче: " . $this->maxLengthLogin . " символов. И не содержать спецсимволы: ". $this->notcorrectsymbol ." .";
                    return false;
                }



            }

        }

        public function addAccountDB()
        {
            $connect = new DB();
            $connect->connect();

            $add = $connect->pdo->prepare("INSERT INTO `users` (login,password,email,about,file) VALUES (?,?,?,?,?)");
            $add->execute(array($this->login_class,password_hash($this->password_class, PASSWORD_DEFAULT),$this->email_class,$this->about_class,$this->file_path));
            if($add)
                return true;
            else
                return false;
            $connect->closeConnect();

        }

        public function checkEmail()
        {
            if (filter_var($this->email_class,FILTER_VALIDATE_EMAIL))
                return true;
            else
                return false;
        }

        public function checkLogin()
        {
            if(strlen($this->login_class) >= $this->minLengthLogin && strlen($this->login_class) <= $this->maxLengthLogin)
            {
                $notcorrectsymbol = $this->notcorrectsymbol;
                $reg = "/[а-Я]/";
                $bool = false;
                for ($i = 0; $i < strlen($this->login_class); $i++)
                {

                    for ($j = 0; $j < strlen($notcorrectsymbol); $j++)
                        if ($this->login_class[$i] == $notcorrectsymbol[$j])
                            $bool = true;

                }

                if ($bool != true)
                {

                    if (!preg_match($reg, $this->login_class))
                        return true;
                    else
                        return false;

                }
            }
            else
                return false;
        }

        public function checkPassword()
        {
            if (strlen($this->password_class) >= $this->minLengthPassword && strlen($this->password_class) <= $this->maxLengthPassword)
            {


                $notcorrectsymbol = $this->notcorrectsymbol;
                $reg = "/[а-Я]/";
                $bool = false;
                for ($i = 0; $i < strlen($this->password_class); $i++)
                {
                    echo $bool;
                    for ($j = 0; $j < strlen($notcorrectsymbol); $j++)
                        if ($this->password_class[$i] == $notcorrectsymbol[$j])
                        {

                            $bool = true;
                            if ($bool == true)
                                echo $this->password_class[$i];

                        }
                }

                if ($bool != true)
                {

                    if (!preg_match($reg, $this->password_class))
                        return true;
                    else
                        return false;

                }
                else
                    return false;


            }
            else
                return false;

        }


        public function checkFile()
        {
            if(!empty($this->file_class['tmp_name']))
            {
                $imageinfo = getimagesize($this->file_class['tmp_name']);
                if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png')
                {
                    return false;
                }
                else{

                    $uploaddir = '../user_files/';
                    $uploadfile = $uploaddir . basename($this->file_class['name']);
                    if (move_uploaded_file($this->file_class['tmp_name'], $uploadfile))
                    {
                        $this->file_path = 'user_files/' . basename($this->file_class['name']);
                        return true;
                    }
                    else
                        return false;
                }
            }
            else
                return true;
        }

        public function checkLoginDB()
        {
            $connect = new DB();
            $connect->connect();

            $query_1 = $connect->pdo->prepare("SELECT * FROM `users` WHERE login = ?");
            $query_1->execute(array($this->login_class));
            if (($row_1 = $query_1->fetch()) > 0)
            {
                return true;
            }else
            {
                return false;
            }
            $connect->closeConnect();
        }


        function getErrorMessage()
        {
            return $this->error_message;
        }

}