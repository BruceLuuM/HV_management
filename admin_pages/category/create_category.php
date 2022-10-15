<?php
// include('../../config/connection.php');

$errors = [];
$category_name_err = "";
$category_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    if (empty($_POST["category_name"])) {
        $category_name_err = "Name is required";
        if (!preg_match("/^[a-zA-Z ]*$/", $category_name)) {
            $category_name_err = "Only letters and white space allowed";
        }
        $errors[] = $category_name_err;
    }

    if (empty($errors)) {
        $category_name = test_input($_POST["category_name"]);

        try {
            $sql_add = "INSERT INTO categorys (name) VALUES ('$category_name')";
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
    <meta charset="utf-8">
    <title>Create category</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body id="adminBody">

    <div class="box">
        <a class="button" href="#create_ad">Add an category</a>
    </div>
    <div id="create_ad" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="adminBody">

                <form action="" method="post">
                    <p>Add an new category</p>
                    <div class="adminInputContainer">
                        <input placeholder="Category" name="category_name" type="text">
                        <span class="error"><?php echo $category_name_err; ?></span>
                    </div>
                    <div class="adminButtonContainer">
                        <button style="background-color: #1877f2" name="create" value="create">Create_category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <table>
        <tr>
            <th>#Num</th>
            <th>ID</th>
            <th>category_name</th>
            <th></th>
        </tr>
        <?php
        try {
            $stmt = $conn->prepare("SELECT * FROM categorys ORDER BY id");
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $i = 0;
        while ($fetch = $stmt->fetch()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $fetch['id']; ?></td>
                <td><?php echo $fetch['name']; ?></td>
                <td>
                    <a class="button" href="admin_pages/category/delete_category.php?id=<?php echo $fetch['id'] ?>">DELETE </a>|<a class="button" href="admin_pages/category/update_category.php?id=<?php echo $fetch['id'] ?>">UPDATE</a>
                </td>
            </tr>
        <?php
        }
        ?>
</body>

</html>