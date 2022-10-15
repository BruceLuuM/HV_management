<?php
include("config/connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/dashbroad.css" />
</head>

<body>
    <div class="header">
        <div class="menu">
            <div class="topnav">
                <a href="#home">MUA BÁN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="#about">CHO THUÊ <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="#contact">KẾT NỐI <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="">TIN TỨC <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="">SỰ KIỆN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="">CHUYÊN ĐỀ <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <a href="">THƯ VIỆN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a>
                <div class="login">
                    <a href="Login.php">Login</a>
                </div>
            </div>
        </div>
        <div class="logo-container">
            <div class="extension">
                <a href=""><strong>LOGO</strong></a>
                <a href="" style="float:right">ĐĂNG TIN</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="big-logo">
            <img src="images/background.png" alt="" style="flex-grow:2">
            <img src="images/background.png" alt="" style="flex-grow:1">
        </div>

        <div class="top-news">
            <h3>TIN TỨC NỔI BẬT
            </h3>
            <a href="">
                <img src="images/icon/icons8-chevron-48.png" alt="" width="100px" height="100px">
            </a>
        </div>
        <div class="top-news">
            <h3>TIN TỨC NỔI BẬT
            </h3>
        </div>
        <div class="top-news">
            <h3>TIN TỨC NỔI BẬT
            </h3>
        </div>


        <div class="sidebar">
            <ul class="list_sidebar">
                <h3>TOP category</h3>

                <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM categorys ORDER BY id");
                    $stmt->execute();
                    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    // header("Location:");s
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                while ($fetch_cat = $stmt->fetch()) {
                ?>
                    <li><a href="?id_cat=<?php echo $fetch_cat['id'] ?>"> <?php echo $fetch_cat['name'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="info">
            <?php
            try {
                $stmt_cat = $conn->prepare("SELECT * FROM categorys WHERE id = :id LIMIT 1");
                $stmt_cat->bindValue(":id", $_GET['id_cat']);
                $stmt_cat->execute();

                $fetchCat = $stmt_cat->fetch();

                $stmt_news = $conn->prepare("SELECT * FROM news WHERE id_cat = :id ORDER BY id_news DESC LIMIT 5");
                $stmt_news->bindValue(":id", $_GET['id_cat']);
                $stmt_news->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
            <div class="news_container">
                <h3>Category: <?php echo $fetchCat['name'] ?></h3>
                <?php
                while ($fetchNew = $stmt_news->fetch()) {
                ?>
                    <div class="news_info">
                        <a href="?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>#info">
                            <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                            <div class="news_des">
                                <p><?php echo $fetchNew['news_header']; ?></p>
                                <p><?php echo $fetchNew['state']; ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div id="info" class="overlay">
                <div class="popup">
                    <a class="close" href="?id_cat=<?php echo $fetchCat['id'] ?>">&times;</a>
                    <?php
                    try {
                        $stmt_descriptions = $conn->prepare("SELECT * FROM news WHERE id_news = :id_news LIMIT 1");
                        $stmt_descriptions->bindValue(":id_news", $_GET['id_news']);
                        $stmt_descriptions->execute();
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                    <?php
                    while ($fetch_descriptions = $stmt_descriptions->fetch()) {
                    ?>
                        <h2><?php echo $fetch_descriptions['news_header']; ?></h2>
                        <img src="/admin_pages/news/uploads/<?php echo $fetch_descriptions['image'] ?>" alt="" width="300px">
                        <p>Người đăng: <?php echo $fetch_descriptions['provider']; ?></p>
                        <p>Giá tiền: <?php echo $fetch_descriptions['price'] ?></p>
                        <p>Diện tích: <?php echo $fetch_descriptions['area'] ?></p>
                        <p><?php echo $fetch_descriptions['descriptions']; ?></p>
                        <p>Trạng thái: <?php echo $fetch_descriptions['state']; ?></p>

                    <?php }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div class="footer">
        <div class="overall">
            <img src="images/logo.png" alt="">
            <div class="more-info">
                <h1>BATDONGSAN</h1>
                <p>Batdongsan.vn là Website thuộc sở hữu của Công ty Cổ phần Đầu tư Tiếp thị Bất động sản Việt Nam (Batdongsan.vn.,JSC), thành lập ngày 14/10/2015, Mã số Doanh nghiệp 0107025430 và trụ sở tại Số 14 Villa D, The Manor, Khu đô thị mới Mỹ Đìn Thành phố Hà Nội.</p>
            </div>
            <div class="slogan">
                <h1>bla</h1>
            </div>
            <div class="slogan">
                <h1>bla</h1>
            </div>
            <div class="slogan">
                <h1>bla</h1>
            </div>
        </div>
        <div class="overall">
            <div class="blank">
                <img src=" images/logo.png" alt="">
            </div>
            <div class="emailform">
                <h3>Đăng ký ngay!</h3>
                <form action="dashbroad.php?id_cat=1">
                    <div class="formContainer">
                        <input type="text" placeholder="EmailAddress">
                        <button>Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>