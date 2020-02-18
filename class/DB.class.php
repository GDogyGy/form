<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 30.01.2020
 * Time: 18:52
 */

class DB
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "user_form";
    private $charset = "utf8";
    private $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public $pdo;
    function connect()
    {

        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset" ,$this->user, $this->password, $this->opt);

    }

    function closeConnect()
    {


        $this->pdo = null;

    }

}