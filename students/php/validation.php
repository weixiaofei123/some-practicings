<?php 
/**
* register
*/
class Register
{
  private $username;
  private $db;
  private $email;
  private $pwd;
  private $con;
  private $code;
  function __construct()
  {
    if (!isset($_POST['type'])) {
      echo "<script>alert('You access the page does not exist!');history.go(-1);</script>";
      exit();
    }
    require '../config.php';
    $this->db = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die('fail');
  }


