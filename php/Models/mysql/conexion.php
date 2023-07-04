<?php
class Conexion{
  static public $connection = false;
  static protected $server;
  static protected $user;
  static protected $pass;
  static protected $db;
  static protected $port;
  static function on(){
    self::$server = getenv('MYSQLHOST');
    self::$user = getenv('MYSQLUSER');
    self::$pass = getenv('MYSQLPASSWORD');
    self::$db = getenv('MYSQLDATABASE');
    self::$port = 7127;

    self::$connection = new mysqli(self::$server, self::$user, self::$pass, self::$db, self::$port);
    if (self::$connection->connect_errno) exit(self::$connection->connect_error);   
  }

  static function off(){
    self::$connection->close();
  }
}
?>