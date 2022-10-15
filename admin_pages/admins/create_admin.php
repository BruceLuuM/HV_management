<?php
// include('../../config/connection.php');

$errors = [];
$full_name_err = $password_err = $username_err = "";
$full_name  = $password = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
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
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $full_name = test_input($_POST["full_name"]);

        try {
            $sql_add = "INSERT INTO admins (username, password, full_name) VALUES ('$username', '$password', '$full_name')";
            $conn->exec($sql_add);
        } catch (PDOException $e) {
            echo $sql_add . "<br>" . $e->getMessage();
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
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body id="adminBody">
    <div class="box">
        <a class="button" href="#create_ad">add an admin</a>
    </div>
    <div id="create_ad" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="adminBody">

                <form action="" method="post">
                    <p>admin a new membership</p>
                    <div class="adminInputContainer">
                        <input placeholder="Full name" name="full_name" type="text">
                        <span class="error"><?php echo $full_name_err; ?></span>

                        <input placeholder="Username" name="username" type="text">
                        <span class="error"><?php echo $username_err; ?></span>

                        <input placeholder="Password" name="password" type="password">
                        <span class="error"><?php echo $password_err; ?></span>
                    </div>
                    <div class="adminButtonContainer">
                        <button style="background-color: #1877f2" name="create" value="create">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>full_name</th>
            <th>username</th>
            <th>password</th>
            <th></th>
        </tr>
        <?php
        try {
            $stmt = $conn->prepare("SELECT * FROM admins ORDER BY id_admin");
            $stmt->execute();
            // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // header("Location:");s
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $i = 0;
        while ($fetch = $stmt->fetch()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $fetch['full_name']; ?></td>
                <td><?php echo $fetch['username']; ?></td>
                <td><?php echo $fetch['password']; ?></td>
                <td>
                    <a class="button" href="admin_pages/admins/delete_admin.php?id=<?php echo $fetch['id_admin'] ?>">DELETE </a>|<a class="button" href="admin_pages/admins/update_admin.php?id=<?php echo $fetch['id_admin'] ?>">UPDATE</a>
                </td>
            </tr>
        <?php
        }
        ?>
</body>

</html>