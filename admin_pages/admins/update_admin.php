<!-- update -->

<?php
include('../../config/connection.php');

$errors = [];
$full_name_err = $password_err = $username_err = "";
$full_name  = $password = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    if (empty($_POST["full_name"])) {
        $full_name_err = "Name is required";
        if (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
            $full_name_err = "Only letters and white space allowed";
        }
        $errors[] = $full_name_err;
    }

    if (empty($_POST["username"])) {
        $username_err = "Username is required!";
        $errors[] = $username_err;
    }

    if (empty($_POST["password"])) {
        $password_err = "Password is required!";
        $errors[] = $password_err;
    }

    if (empty($errors)) {
        $full_name = test_input($_POST["full_name"]);
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

        try {
            $stmt = $conn->prepare("UPDATE admins SET full_name = :full_name, username = :username, password = :password WHERE id_admin = :id_admin");
            $stmt->bindValue(":full_name", $full_name);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", $password);
            $stmt->bindValue(":id_admin", $_GET['id']);

            $stmt->execute();
            // header("Location:create_admin.php");
            header("Location:../../different_index.php?state=1");
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
    <meta charset="utf-8">
    <title>Updata admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body id="adminBody">
    <div id="create_ad">
        <div>
            <h2>Here i am</h2>
            <div class="adminBody">
                <!-- read -->
                <?php

                try {
                    $stmt = $conn->prepare("SELECT * FROM admins WHERE id_admin = :id_admin LIMIT 1");
                    $stmt->bindValue(":id_admin", $_GET['id']);
                    $stmt->execute();
                    $fetch = $stmt->fetch();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $_GET['id']; ?>" method="post">
                    <p>Update</p>
                    <div class="adminInputContainer">
                        <label for="full_name"> Full Name:</label>
                        <input value=<?php echo $fetch["full_name"]; ?> name="full_name" type="text">
                        <span class="error"><?php echo $full_name_err; ?></span>

                        <label for="username"> Username:</label>
                        <input value=<?php echo $fetch["username"]; ?> name="username" type="text">
                        <span class="error"><?php echo $username_err; ?></span>

                        <label for="password"> Password:</label>
                        <input value=<?php echo $fetch["password"]; ?> name="password" type="text">
                        <span class="error"><?php echo $password_err; ?></span>
                    </div>
                    <div class="adminButtonContainer">
                        <button style="background-color: #1877f2" name="update" value="update">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>