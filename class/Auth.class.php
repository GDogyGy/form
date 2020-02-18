<?php

include_once '../class/UserCreate.class.php';

class Auth extends UserCreate
{

        public function authen()
        {

            if (parent::checkLogin())
            {
                if (parent::checkPassword())
                {
                    if($this->auth_select())
                    {

                        return true;
                    }
                    else
                    {
                        $this->error_message = "Пользователь с таким логином или паролем не зарегистрирован";
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

        public  function auth_select()
        {
            $connect = new DB();
            $connect->connect();

            $sel = $connect->pdo->prepare("SELECT * FROM `users` WHERE  login = ?");
            $sel->execute(array($this->login_class));


            if($row = $sel->fetch())
            {

                if(password_verify($this->password_class, $row['password']))
                {
                    setcookie('login',$row['login'], time() + 3600, "/");
                    setcookie('email',$row['email'], time() + 3600, "/");
                    setcookie('about',$row['about'], time() + 3600, "/");
                    setcookie('file',$row['file'], time() + 3600, "/");
                    return true;
                }
                else
                    return false;

            }
            else
                return false;
            $connect->closeConnect();
        }
}