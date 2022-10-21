<?php
include("config/connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/dashbroad.css" />
    <link rel="stylesheet" type="text/css" href="css/Detail.css" />
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

    <div class="Detail">
        <?php
        try {
            $stmt_descriptions = $conn->prepare("SELECT * FROM news WHERE id_news = :id_news LIMIT 1");
            $stmt_descriptions->bindValue(":id_news", $_GET['id_news']);
            $stmt_descriptions->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        while ($fetch_descriptions = $stmt_descriptions->fetch()) {
        ?>
            <div class="main">
                <div class="detail-img">
                    <img src="/admin_pages/news/uploads/<?php echo $fetch_descriptions['image'] ?>" alt="">
                </div>
                <div class="detail-info ">
                    <h3><?php echo $fetch_descriptions['news_header']; ?></h3>
                    <p><strong style="color:red; font-size:18px;"><?php echo $fetch_descriptions['price'] ?></strong></p>
                    <hr color="#000" size="1" width="100%">
                    <p><strong>Diện tích: </strong><?php echo $fetch_descriptions['area'] ?></p>
                    <p><strong>Số phòng: </strong><?php echo $fetch_descriptions['rooms'] ?></p>
                    <hr color="#000" size="1" width="100%">
                    <p><strong>Mã tin: </strong><?php echo $fetch_descriptions['id_news'] ?></p>
                    <p>Trạng thái: <?php echo $fetch_descriptions['state']; ?></p>
                    <hr color="#000" size="1" width="100%">
                    <div class="warning">
                        <a><img src="images/icon/icons8-share-30.png" alt=""> Chia sẻ</a>
                        <a><img src="images/icon/icons8-warning-58.png" alt=""> Báo xấu</a>
                        <a><img src="images/icon/icons8-heart-50.png" alt=""> Lưu tin</a>
                    </div>
                </div>

                <div class="user-contact">
                    <div class="detail-user">
                        <img src="images/icon/icons8-account-64.png" alt="">
                        <p>Người đăng: <?php echo $fetch_descriptions['provider']; ?></p>
                    </div>
                    <button>email</button>
                    <button>number</button>
                    <div class="fast-contact">
                        <a href=""> <img src="images/icon/icons8-paper-plane-50.png" alt="" width="15px"> trả giá</a>
                        <a href=""> <img src="images/icon/icons8-paper-plane-50.png" alt="" width="15px"> liên hệ</a>
                    </div>
                    <p>Hãy gửi yêu cầu tư vấn. Tôi sẽ liên hệ trả lời bạn trong vòng 60 phút.</p>
                </div>
            </div>
    </div>


    <div class="Detail">
        <h3>NỘI DUNG TIN ĐĂNG</h3>
        <p><?php echo nl2br($fetch_descriptions['descriptions']); ?></p>
    <?php }
    ?>
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