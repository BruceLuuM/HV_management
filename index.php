<?php
include("config/connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Bất động sản</title>
    <link rel="icon" href="images/icon/icons8-account-64.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="css/dashbroad.css" />
</head>

<body>
    <div class="header">
        <div class="topnav">
            <?php
            try {
                $stmt_cat_topnav_1 = $conn->prepare("SELECT * FROM categorys");
                $stmt_cat_topnav_1->execute();

                $stmt_cat_topnav_2 = $conn->prepare("SELECT * FROM categorys");
                $stmt_cat_topnav_2->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
            <div>
                <div class="dropdown">
                    <button><a href="#home">MUA BÁN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <?php
                        while ($fetch_cat_topnav_1 = $stmt_cat_topnav_1->fetch()) {
                        ?>
                            <a href="#">Bán <?php echo $fetch_cat_topnav_1['name'] ?> </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">CHO THUÊ <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <?php
                        while ($fetch_cat_topnav_2 = $stmt_cat_topnav_2->fetch()) {
                        ?>
                            <a href="#">Cho thuê <?php echo $fetch_cat_topnav_2['name'] ?> </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">KẾT NỐI <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <a href="#">Dự án</a>
                        <a href="#">Liên minh</a>
                        <a href="#">Sàn dao dịch</a>
                        <a href="#">Chủ đầu tư</a>
                        <a href="#">Môi giới</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">TIN TỨC <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <a href="#">Nhìn ra thế giới</a>
                        <a href="#">Chuyển động thị trường</a>
                        <a href="#">Chính sách quản lý</a>
                        <a href="#">Chính sách quản lý</a>
                        <a href="#">Thông tin quy hoạch</a>
                        <a href="#">Giải pháp công nghệ</a>
                        <a href="#">Hoạt động doanh nghiệp</a>
                        <a href="#">Thông tin sự kiện</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">SỰ KIỆN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <a href="#">Sự kiện ra mắt</a>
                        <a href="#">Sự kiện hội thảo</a>
                        <a href="#">Sự kiện đào tạo</a>
                        <a href="#">Sự kiện đầu tư</a>

                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">CHUYÊN ĐỀ <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <a href="#">Bất động sản số</a>
                        <a href="#">Hệ sinh thái bất động sản</a>
                        <a href="#">Khởi nghiệp bất động sản</a>
                        <a href="#">Vấn đề và Giải pháp</a>
                        <a href="#">Bất động sản thời Covid</a>

                    </div>
                </div>
                <div class="dropdown">
                    <button><a href="#home">THƯ VIỆN <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px"></a></button>
                    <div class="options_dropdown">
                        <a href="#">Nội thất</a>
                        <a href="#">Kiến trúc</a>
                        <a href="#">Ngoại thất</a>
                        <a href="#">Phong thủy</a>
                        <a href="#">Kiến thức</a>
                        <a href="#">Pháp luật</a>
                        <a href="#">Sách và tài liệu</a>

                    </div>
                </div>
            </div>
            <div class="login">
                <button>
                    <a href="Register.php">ĐĂNG KÝ </a>
                    <a>|</a>
                    <a href="Login.php"> ĐĂNG NHẬP</a>
                </button>
            </div>
        </div>
        <div class="logo-container">
            <div class="extension">
                <div class="logobar">
                    <a href=""><img src="images/icon/menu.png" alt="" height="15px" style="padding-right: 15px"></a>
                    <a href="http://localhost:1004/dashbroad.php?id_cat=1"><img src="https://s1.cdn.batdongsan.vn/upload/thumb/file/2021/05/0001/logo.png" alt="" height="30px"></a>
                </div>

                <div class="searchbar">
                    <form action="dashbroad.php">

                        <div class="fastsearch">
                            <select name="Nhu cầu" id="#">
                                <option value="">Nhu cầu</option>
                                <option value="sell">Bán</option>
                                <option value="forHide">Cho Thuê</option>
                            </select>
                    </form>
                </div>
                <div class="fastsearch">
                    <form action="dashbroad.php">
                        <select name="Phân Khúc" id="#">
                            <option value="">Phân khúc</option>
                            <optgroup label="Nhà">
                                <option value="Nhà riêng">Nhà riêng</option>
                                <option value="Nhà cổ">Nhà cổ</option>
                            </optgroup>
                            <optgroup label="Đẩt">
                                <option value="Đất nền thổ cư">Đất nền thổ cư</option>
                                <option value="Đất vàng">Đất vàng</option>
                            </optgroup>
                        </select>
                    </form>
                </div>
                <div class="fastsearch">
                    <form action="dashbroad.php">
                        <select name="Khu vực" id="#">
                            <option value="">Khu vực</option>
                            <option value="Hanoi">Hà Nội</option>
                            <option value="HoChiMinhcity">TP Hồ Chí Minh</option>
                        </select>
                    </form>
                </div>
                <button style="background-color: #f7841b"> <img src="images/icon/search-12-16.png" alt=""> TÌM KIẾM</button>
                <img src="images/icon/icons8-chevron-48.png" alt="" width="15px" height="15px">
                <a href="#search-toggle" style="text-decoration:none; color:black"><img src="images/icon/icons8-expand-arrow-30.png" alt="" width="15px" height="15px">Nâng cao</a>
                <button style="background-color: #01b0f1"> <img src="images/icon/paper-plane-16.png" alt="">ĐĂNG TIN</button>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="big-logo">
            <div id="image-transition" style="flex-grow:2">
                <img src="https://s1.cdn.batdongsan.vn/upload/file/2021/11/0001/f13da932b0ad78f321bc2.jpg" class="bottom">
                <img src="https://s1.cdn.batdongsan.vn/upload/file/2021/11/0001/9bcfada6b4397c672528.jpg" class="top">
            </div>
            <img src=" https://i3.ytimg.com/vi/KRvFvll_ykE/maxresdefault.jpg" alt="" style="flex-grow:1">
        </div>

        <?php
        try {
            $stmt_news = $conn->prepare("SELECT * FROM news WHERE id_cat = :id ORDER BY id_news DESC LIMIT 5");
            $stmt_news->bindValue(":id", $_GET['id_cat']);
            $stmt_news->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

        <div class="top-news">
            <div class=top-search>
                <h3>TIN TỨC NỔI BẬT </h3>
                <div>
                    <a href="">Thông tin sự kiện</a>
                    <a href="">Nhìn ra thế giới</a>
                    <a href="">Tin tổng hợp</a>
                    <a href="">Chuyển động thị trường</a>
                    <a href="">Chính sách quản lý</a>
                </div>
            </div>
            <div class="top-news-info">
                <?php
                while ($fetchNew = $stmt_news->fetch()) {
                ?>
                    <div class="each-top-news">
                        <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                            <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                        </a>
                        <p><strong><?php echo $fetchNew['news_header'] ?></strong></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <?php
        try {
            $stmt_news = $conn->prepare("SELECT * FROM news WHERE id_cat = :id ORDER BY id_news DESC LIMIT 5");
            $stmt_news->bindValue(":id", $_GET['id_cat']);
            $stmt_news->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

        <div class="top-news">
            <div class=top-search>
                <h3>SỰ KIỆN NỔI BẬT </h3>
                <div>
                    <a href="">Sự kiện ra mắt</a>
                    <a href="">Sự kiện đầu tư</a>
                    <a href="">Sự kiện hội thảo</a>
                    <a href="">Sự kiện đào tạo</a>
                </div>
            </div>
            <div class="top-news-info">
                <?php
                while ($fetchNew = $stmt_news->fetch()) {
                ?>
                    <div class="each-top-news">
                        <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                            <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                        </a>
                        <p><strong><?php echo $fetchNew['news_header'] ?></strong></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <?php
        try {
            $stmt_news = $conn->prepare("SELECT * FROM news WHERE id_cat = :id ORDER BY id_news DESC LIMIT 5");
            $stmt_news->bindValue(":id", $_GET['id_cat']);
            $stmt_news->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

        <div class="top-news">
            <div class=top-search>
                <h3>BẤT ĐỘNG SẢN NỔI BẬT </h3>
                <div>
                    <a href=""><img src="images/icon/icons8-less-than-30.png" alt="" width="14px" height="14px"></a>
                    <a href=""><img src="images/icon/icons8-more-than-30.png" alt="" width="14px" height="14px"></a>
                </div>
            </div>
            <div class="top-news-info">
                <?php
                while ($fetchNew = $stmt_news->fetch()) {
                ?>
                    <div class="each-top-news">
                        <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                            <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                        </a>
                        <p><strong><?php echo $fetchNew['news_header'] ?></strong></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="sidebar">
            <ul class="list_sidebar">
                <h3>TOP 10 PHÂN KHÚC TIÊU BIỂU</h3>
                <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM categorys ORDER BY id LIMIT 10");
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
            <ul class="list_sidebar">
                <h3>TOP 5 CHỦ ĐẦU TƯ TIÊU BIỂU </h3>

                <?php
                try {
                    $stmt_top_provider = $conn->prepare("SELECT * FROM news ORDER BY id_news LIMIT 5");
                    $stmt_top_provider->execute();
                    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    // header("Location:");s
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                while ($fetch_top_provider = $stmt_top_provider->fetch()) {
                ?>
                    <li><a href="?id_cat=<?php echo $fetch_top_provider['id_news'] ?>"> <?php echo $fetch_top_provider['provider'] ?></a></li>
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
                <h3>BẤT ĐỘNG SẢN DÀNH CHO BẠN</h3>
                <?php
                while ($fetchNew = $stmt_news->fetch()) {
                ?>
                    <div class="news_info">
                        <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                            <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                        </a>

                        <div class="news_des">
                            <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                                <p><?php echo $fetchNew['news_header']; ?></p>
                            </a>
                            <div class="core_info">
                                <p> <strong style="color:red"><?php echo $fetchNew['price']; ?></strong> </p>
                                <p> <?php echo $fetchNew['area']; ?> </p>
                                <p> <?php echo $fetchCat['name']; ?></p>
                            </div>
                            <div class="text" style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical;">
                                <p><?php echo $fetchNew['descriptions'] ?></p>
                            </div>
                            <div class="user">
                                <p><img src="images/icon/icons8-account-64.png" alt=""></p>
                                <p><?php echo $fetchNew['provider'] ?></p>
                                <p><img src="images/icon/icons8-clock-50.png" alt=""></p>
                                <p>00:00:00</p>
                                <p><img src="images/icon/icons8-heart-50.png" alt=""></p>
                                <p>Lưu tin</p>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="top-news">
            <div class=top-search>
                <h3>BẤT ĐỘNG SẢN NỔI BẬT </h3>
                <div>
                    <a href=""><img src="images/icon/icons8-less-than-30.png" alt="" width="14px" height="14px"></a>
                    <a href=""><img src="images/icon/icons8-more-than-30.png" alt="" width="14px" height="14px"></a>
                </div>
            </div>
            <div class="top-news-info">
                <div class="each-top-news">
                    <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                        <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                    </a>
                    <p><strong><?php echo $fetchNew['news_header'] ?></strong></p>
                </div>
            </div>
        </div>

        <div class="top-news">
            <div class=top-search>
                <h3>BẤT ĐỘNG SẢN NỔI BẬT </h3>
                <div>
                    <a href=""><img src="images/icon/icons8-less-than-30.png" alt="" width="14px" height="14px"></a>
                    <a href=""><img src="images/icon/icons8-more-than-30.png" alt="" width="14px" height="14px"></a>
                </div>
            </div>
            <div class="top-news-info">
                <div class="each-top-news">
                    <a href="Details.php?id_cat=<?php echo $fetchCat['id']; ?>&id_news=<?php echo $fetchNew['id_news']; ?>">
                        <img src="/admin_pages/news/uploads/<?php echo $fetchNew['image'] ?>" alt="">
                    </a>
                    <p><strong><?php echo $fetchNew['news_header'] ?></strong></p>
                </div>
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="overall">
            <img src="https://s1.cdn.batdongsan.vn/upload/file/2021/08/0001/217e27ad598dabd3f29c-1.jpg" alt="" width="200px" height="200px">
            <div class="more-info">
                <h4>BATDONGSAN.VN</h4>
                <p>Batdongsan.vn là Website thuộc sở hữu của Công ty Cổ phần Đầu tư Tiếp thị Bất động sản Việt Nam (Batdongsan.vn.,JSC), thành lập ngày 14/10/2015, Mã số Doanh nghiệp 0107025430 và trụ sở tại Số 14 Villa D, The Manor, Khu đô thị mới Mỹ Đìn Thành phố Hà Nội.</p>
            </div>
            <div style="display: flex">
                <div class="slogan">
                    <strong>PORTAL</strong>
                    <p>
                        CỔNG THÔNG TIN BẤT ĐỘNG SẢN CỘNG ĐỒNG NGƯỜI VIỆT TOÀN CẦU
                        REAL ESTATE PORTAL NETWORK</p>
                </div>
                <div class="slogan">
                    <strong>SOCIAL</strong>
                    <p>
                        MẠNG XÃ HỘI BẤT ĐỘNG SẢN CỘNG ĐỒNG NGƯỜI VIỆT TOÀN CẦU
                        REAL ESTATE SOCIAL NETWORK</p>
                </div>
                <div class="slogan">
                    <strong>CHANNEL</strong>
                    <p>
                        HỆ THỐNG KÊNH TẠP CHÍ VÀ TRUYỀN HÌNH BẤT ĐỘNG SẢN SỐ
                        REAL ESTATE DIGITAL MEDIA</p>
                </div>
            </div>
        </div>
        <div class="overall">
            <div class="blank">
                <ul>
                    <strong>BATDONGSAN</strong>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Tin hoạt động</a></li>
                    <li><a href="">Sự kiện</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
                <ul>
                    <strong>QUY ĐỊNH</strong>
                    <li><a href="">Quy định đăng tin</a></li>
                    <li><a href="">Quy chế hoạt động </a></li>
                    <li><a href="">Điều khoản thỏa thuận</a></li>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Giải quyết khiếu nại</a></li>
                    <li><a href="">Góp ý báo lỗi</a></li>
                </ul>
                <ul>
                    <strong>LIÊN KẾT</strong>
                    <li><a href="">Webnhanhieu.com</a></li>
                    <li><a href="">Sancongngheso.com</a></li>
                    <li><a href="">RealtorNetwork.vn</a></li>
                    <li><a href="">RealtorJob.vn</a></li>
                    <li><a href="">RealtorAcademy.vn</a></li>
                    <li><a href="">CityLandNetwork.vn</a></li>
                </ul>
            </div>
            <div class="emailform">
                <h4>MẠNG XÃ HỘI</h4>

                <a href=""><img src="/images/icon/icons8-facebook-f-30.png" alt=""></a>
                <a href=""><img src="/images/icon/icons8-instagram-50.png" alt=""></a>
                <a href=""><img src="/images/icon/icons8-youtube-logo-24.png" alt=""></a>

                <h4>ĐĂNG KÝ NHẬN THÔNG TIN MIỄN PHÍ</h4>
                <form action="dashbroad.php?id_cat=1">
                    <div class="formContainer">
                        <input type="text" placeholder="EmailAddress">
                        <button><img src="images/icon/icons8-paper-plane-50.png" alt=""> Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>