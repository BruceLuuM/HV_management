<?php
class OOPCrud
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=real_estate_db", $this->username, $this->password);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
</body>

</html>