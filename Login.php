<?php
include('config/connection.php');
session_start();

$errors = [];
$username_err = $password_err = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_err = "Username is required";
        $errors[] = $username_err;
    }

    if (empty($_POST["password"])) {
        $password_err = "Please enter password!";
        $errors[] = $password_err;
    }

    if (empty($errors)) {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        echo "test";

        try {
            $stmt = $conn->prepare("SELECT * FROM admins WHERE username = :username AND password = :password");
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $password);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $_SESSION["name"] = $result['full_name'];

                header("Location: different_index.php?state=1");
            } else {
                echo "<h1> Please login first</h1>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <style>
        .error {
            color: #ff0000;
        }
    </style>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body id="loginBody">
    <div class="loginBody">
        <form action="Login.php" method="post">
            <p>Sign in to start your session</p>
            <div class="loginInputContainer">
                <input placeholder="Username" name="username" type="text">
                <span class="error"><?php echo $username_err; ?></span>
            </div>
            <div class="loginInputContainer">
                <input placeholder="Password" name="password" type="password">
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            <div class="loginButtonContainer">
                <input type="checkbox" name="RememberMe" value="checked">
                <label for="RememberMe" style="margin:auto; padding-left:1px"> <strong>Remember Me</strong> </label><br>
                <button style="background-color: #1877f2">Sign in</button>
            </div>
            <p style="text-align:start"><a href="Forget_password.php" style="text-decoration: none; color:dodgerblue">I forgot my password</a></p>
        </form>
    </div>
</body>

</html>