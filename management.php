<?php
include("config/connection.php");
session_start();
?>

<!DOCTYPE html>
<html>


<head>
    <style>
        body {
            margin: 0;
        }

        .header {
            width: 100%;
            height: 40px;
            font-size: 10px;
            background: #fbc040;
            color: #f1f1f1;
            padding-top: 1%;
            position: sticky;
            top: 0;
        }

        .header a {
            float: right;
            font-weight: bold;
            font-size: 15px;
            color: #5d5c5c;
            padding: 5px 10px;
            text-decoration: none;
        }

        .header a:hover {
            border-radius: 5px;
            border: 2px solid #fff;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 25%;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION['name']) {
    ?>
        <div class="header">
            <h2>Welcome <?php echo $_SESSION['name']; ?><a href="Logout.php">Logout</a></h2>

        </div>
        <ul>
            <li class=""><a href="?state=1">Admin_management</a></li>
            <li><a href="?state=2">Category_management</a></li>
            <li><a href="?state=3">product_management</a></li>
        </ul>

        <div style="margin-left:25%">
            <?php
            if ($_GET['state'] == 1) {
                include("admin_pages/admins/create_admin.php");
            } else if ($_GET['state'] == 2) {
                include("admin_pages/category/create_category.php");
            } else if ($_GET['state'] == 3) {
                include("admin_pages/news/create_news.php");
            }
            ?>
        </div>
    <?php
    } else echo "<h1> Please login first</h1>";
    ?>
</body>

</html>