<!-- update -->

<?php
include('../../config/connection.php');

$errors = [];
$category_name_err = "";
$category_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
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
            $stmt = $conn->prepare("UPDATE categorys SET name = :category_name WHERE id = :id_admin");
            $stmt->bindValue(":category_name", $category_name);
            $stmt->bindValue(":id_admin", $_GET['id']);

            $stmt->execute();
            // header("Location:create_category.php");
            header("Location:../../different_index.php?state=2");
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
    <title>Update category</title>
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
                    $stmt = $conn->prepare("SELECT * FROM categorys WHERE id = :id LIMIT 1");
                    $stmt->bindValue(":id", $_GET['id']);
                    $stmt->execute();
                    $fetch = $stmt->fetch();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $_GET['id']; ?>" method="post">
                    <p>Update</p>
                    <div class="adminInputContainer">
                        <label for="category_name"> Category name:</label>
                        <input value="<?php echo $fetch["name"]; ?>" name="category_name" type="text">
                        <span class="error"><?php echo $category_name_err; ?></span>
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