<?php
// include('../../config/connection.php');

$errors = [];
$news_header_err = $provider_err = $image_err = "";
$id_category = $news_header = $provider = $descriptions = $state = $image = $price = $area = $rooms = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
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

        // image 
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $image = time() . "_" . basename($image);

        $price = test_input($_POST["price"]);
        $area = test_input($_POST["area"]);
        $rooms = test_input($_POST["rooms"]);
        $address = test_input($_POST["address"]);

        try {
            $stmt_add = "INSERT INTO news (id_cat, news_header, provider, descriptions, state, image, price, area, rooms, address) VALUES ( '$id_category', '$news_header', '$provider', '$descriptions', '$state', '$image', '$price', '$area', '$rooms', '$address')";
            $conn->exec($stmt_add);
            echo var_dump($tmp_image);
            echo var_dump($image);

            $moved = move_uploaded_file($tmp_image, "admin_pages/news/uploads/" . $image);
            echo var_dump($moved);
        } catch (PDOException $e) {
            echo $stmts_add . "<br>" . $e->getMessage();
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
    <title>Create news</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body id="adminBody">
    <div class="box">
        <a class="button" href="#create_ad">Add a news</a>
    </div>
    <div id="create_ad" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="adminBody">

                <form action="" method="post" enctype="multipart/form-data">
                    <p>Create a news</p>
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

                        <input placeholder="Header" name="news_header" type="text">
                        <span class="error"><?php echo $news_header_err; ?></span>

                        <input placeholder="provider" name="provider" type="select">
                        <span class="error"><?php echo $provider_err; ?></span>

                        <input placeholder="Price" name="price" type="text">

                        <input placeholder="Area" name="area" type="text">

                        <input placeholder="Rooms" name="rooms" type="text">

                        <input placeholder="Address" name="address" type="text">

                        <textarea placeholder="descriptions" name="descriptions" type="text" style="height:80px;"> </textarea>

                        <input name="image" type="file">
                    </div>
                    <div class="adminButtonContainer">
                        <input name="state" type="checkbox" value="available">
                        <label for="state" style="margin:auto; padding-left:1px"> <strong>available</strong> </label><br>
                        <button style="background-color: #1877f2" name="create" value="create">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <table>
        <tr>
            <th>ID</th>
            <th>id_category</th>
            <th>news_header</th>
            <th>provider</th>
            <th>description</th>
            <th>state</th>
            <th>image</th>
            <th>price</th>
            <th>area</th>
            <th>rooms</th>
            <th>address</th>

            <th></th>
        </tr>
        <?php
        // $id_category = $news_header = $provider = $descriptions = $state = $image = $price = $area = $rooms = $address = "";

        try {
            $stmt = $conn->prepare("SELECT * FROM news ORDER BY id_news DESC");
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
                <td><?php echo $fetch['id_cat']; ?></td>
                <td><?php echo $fetch['news_header']; ?></td>
                <td><?php echo $fetch['provider']; ?></td>
                <td><?php echo $fetch['descriptions']; ?></td>
                <td><?php echo $fetch['state']; ?></td>
                <td> <img src="/admin_pages/news/uploads/<?php echo $fetch['image'] ?>" alt="" width="150px"></td>
                <td><?php echo $fetch['price']; ?></td>
                <td><?php echo $fetch['area']; ?></td>
                <td><?php echo $fetch['rooms']; ?></td>
                <td><?php echo $fetch['address']; ?></td>

                <td>
                    <a class="button" href="admin_pages/news/delete_news.php?id=<?php echo $fetch['id_news'] ?>">DELETE </a>|<a class="button" href="admin_pages/news/update_news.php?id=<?php echo $fetch['id_news'] ?>">UPDATE</a>
                </td>
            </tr>
        <?php
        }
        ?>
</body>

</html>