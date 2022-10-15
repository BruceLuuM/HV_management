<?php
session_start();
unset($_SESSION["name"]);
header("Location:Login.php");
session_destroy();
