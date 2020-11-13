<?php


$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test_quiz"; /* Database name */

//Database Connection
define('db_host', $host);
define('db_user', $user);
define('db_password', $password );
define('db_name', $dbname);


class db_conn
{
    private $conn;
    function __construct()
    {
    }
    function connect()
    {
        $this->conn = new mysqli(db_host, db_user, db_password, db_name);
        if (mysqli_connect_errno()) {
            echo "Connection failed" . mysqli_connect_error();
        }
      else{
  echo 'connected';
}
        return $this->conn;
    }
}




$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

?>