<!-- update -->

<?php
include('../../config/connection.php');

$errors = [];
$news_header_err = $provider_err = $image_err = "";
$id_category = $news_header = $provider = $descriptions = $state = $image = $price = $area = $rooms = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {

    if (empty($_POST["news_header"])) {
        $news_header_err = "Header is required!";
        $errors[] = $news_header_err;
    }
    if (empty($_POST["provider"])) {
        $provider_err = "Provider is required!";
        $errors[] = $provider_err;
    }


    if (empty($errors)) {
        $id_category = test_input($_POST["id_category"]);
        $news_header = test_input($_POST["news_header"]);
        $provider = test_input($_POST["provider"]);
        $descriptions = $_POST["descriptions"];
        if (empty($_POST["state"])) {
            $state = "unavailable";
        } else {
            $state = test_input($_POST["state"]);
        }

        //image
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $image = time() . "_" . basename($image);

        $price = test_input($_POST["price"]);
        $area = test_input($_POST["area"]);
        $rooms = test_input($_POST["rooms"]);
        $address = test_input($_POST["address"]);


        if ($tmp_image != "") {

            $stmt_unlink = $conn->prepare("SELECT * FROM news WHERE id_news = :id_news LIMIT 1");
            $stmt_unlink->bindValue(":id_news", $_GET['id']);
            $stmt_unlink->execute();

            while ($fetch = $stmt_unlink->fetch()) {
                unlink('uploads/' . $fetch['image']);
            }
            try {
                $stmt = $conn->prepare("UPDATE news SET id_cat = :id_category, news_header = :news_header, provider = :provider, descriptions = :descriptions, state = :state, image = :image, price = :price, area = :area, rooms = :rooms, address = :address WHERE id_news = :id_news");
                $stmt->bindValue(":id_category", $id_category);
                $stmt->bindValue(":news_header", $news_header);
                $stmt->bindValue(":provider", $provider);
                $stmt->bindValue(":descriptions", $descriptions);
                $stmt->bindValue(":state", $state);
                $stmt->bindValue(":image", $image);
                $stmt->bindValue(":price", $price);
                $stmt->bindValue(":area", $area);
                $stmt->bindValue(":rooms", $rooms);
                $stmt->bindValue(":address", $address);
                $stmt->bindValue(":id_news", $_GET['id']);
                $stmt->execute();

                echo var_dump($tmp_image);
                echo var_dump($image);
                $moved = move_uploaded_file($tmp_image, "uploads/" . $image);
                echo var_dump($moved);
                // header("Location:create_product.php");
                header("Location:../../different_index.php?state=3");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            try {
                $stmt = $conn->prepare("UPDATE news SET id_cat = :id_category, news_header = :news_header, provider = :provider, descriptions = :descriptions, state = :state, price = :price, area = :area, rooms = :rooms, address = :address WHERE id_news = :id_news");
                $stmt->bindValue(":id_category", $id_category);
                $stmt->bindValue(":news_header", $news_header);
                $stmt->bindValue(":provider", $provider);
                $stmt->bindValue(":descriptions", $descriptions);
                $stmt->bindValue(":state", $state);
                $stmt->bindValue(":price", $price);
                $stmt->bindValue(":area", $area);
                $stmt->bindValue(":rooms", $rooms);
                $stmt->bindValue(":address", $address);
                $stmt->bindValue(":id_news", $_GET['id']);
                $stmt->execute();

                // header("Location:create_product.php");
                header("Location:../../different_index.php?state=3");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
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
    <title>Update new</title>
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
                    $stmt = $conn->prepare("SELECT * FROM news WHERE id_news = :id_news LIMIT 1");
                    $stmt->bindValue(":id_news", $_GET['id']);
                    $stmt->execute();
                    $fetch = $stmt->fetch();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                    <p>Update product</p>
                    <div class="adminInputContainer">
                        <select name="id_category">
                            <?php
                            try {
                                $stmt_select_cat = $conn->prepare("SELECT * FROM categorys ORDER BY id");
                                $stmt_select_cat->execute();
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                            while ($fetch_select_cat = $stmt_select_cat->fetch()) {
                            ?>
                                <option value="<?php echo $fetch_select_cat['id'] ?>"><?php echo $fetch_select_cat['name']; ?></option>

                            <?php } ?>

                        </select>

                        <input value="<?php echo $fetch["news_header"]; ?>" name="news_header" type="text">
                        <span class="error"><?php echo $news_header_err; ?></span>

                        <input value="<?php echo $fetch["provider"]; ?>" name="provider" type="tezt">
                        <span class="error"><?php echo $provider_err; ?></span>

                        <input value="<?php echo $fetch["price"]; ?>" name="price" type="text">

                        <input value="<?php echo $fetch["area"]; ?>" name="area" type="text">

                        <input value="<?php echo $fetch["rooms"]; ?>" name="rooms" type="text">

                        <input value="<?php echo $fetch["address"]; ?>" name="address" type="text">

                        <input value="<?php echo $fetch["descriptions"]; ?>" name="descriptions" type="text" style="height:80px;">

                        <div class="up_img">
                            <input name="image" type="file">
                            <img src="/admin_pages/news/uploads/<?php echo $fetch['image'] ?>" alt="" width="150px"></img>
                        </div>
                        <div class=" adminButtonContainer">
                            <input name="state" type="checkbox" value="available">
                            <label for="state" style="margin:auto; padding-left:1px"> <strong>available</strong> </label><br>
                            <button style="background-color: #1877f2" name="update" value="update">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>