<?php
include('config/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }
    </style>
</head>

<body class="">
    <!-- Top container -->
    <div class="bar top black large" style="z-index:4">
        <button class="bar-item button hide-large hover-none hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="bar-item">Logo</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="sidebar collapse white animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="container row">
            <div class="col s4">
                <img src="/w3images/avatar2.png" class="circle margin-right" style="width:46px">
            </div>
            <div class="col s8 bar">
                <span>Welcome, <strong>Mike</strong></span><br>
                <a href="#" class="bar-item button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="bar-item button"><i class="fa fa-user"></i></a>
                <a href="#" class="bar-item button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="container">
            <h5>Dashboard</h5>
        </div>
        <div class="bar-block">
            <a href="#" class="bar-item button padding-16 hide-large dark-grey hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" class="bar-item button padding blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-bell fa-fw"></i>  News</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-bank fa-fw"></i>  General</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-history fa-fw"></i>  History</a>
            <a href="#" class="bar-item button padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="overlay hide-large animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <hr>
        <div class="container">
            <h5>General Stats</h5>
            <p>New Visitors</p>
            <div class="grey">
                <div class="container center padding green" style="width:25%">+25%</div>
            </div>

            <p>New Users</p>
            <div class="grey">
                <div class="container center padding orange" style="width:50%">50%</div>
            </div>

            <p>Bounce Rate</p>
            <div class="grey">
                <div class="container center padding red" style="width:75%">75%</div>
            </div>
        </div>
        <hr>

        <div class="container">
            <h5>Countries</h5>
            <table class="table striped bordered border hoverable white">
                <tr>
                    <th>ID</th>
                    <th>full_name</th>
                    <th>username</th>
                    <th>password</th>
                </tr>
                <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM admin ORDER BY id_admin");
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
                            <a href="">XOA</a>|<a href="">SUA</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table><br>
            <button class="button dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
        </div>
        <hr>

        <br>
        <div class="container dark-grey padding-32">
            <div class="row">
                <div class="container third">
                    <h5 class="bottombar border-green">Demographic</h5>
                    <p>Language</p>
                    <p>Country</p>
                    <p>City</p>
                </div>
                <div class="container third">
                    <h5 class="bottombar border-red">System</h5>
                    <p>Browser</p>
                    <p>OS</p>
                    <p>More</p>
                </div>
                <div class="container third">
                    <h5 class="bottombar border-orange">Target</h5>
                    <p>Users</p>
                    <p>Active</p>
                    <p>Geo</p>
                    <p>Interests</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="container padding-16">
            <h4>FOOTER</h4>
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </footer>

        <!-- End page content -->
    </div>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>

</body>

</html>