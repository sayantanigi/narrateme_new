<?php $uid = base64_decode($_GET["token"]);
//echo $uid;die;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Narrateme | Courses</title>

    <link rel="stylesheet" href="<?= base_url(); ?>user_panel/new/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>user_panel/new/css/custom.css">
    <link rel="stylesheet" href="<?= base_url(); ?>user_panel/new/css/menu.css">
    <link rel="stylesheet" href="<?= base_url(); ?>user_panel/new/css/responsive-media.css">
    <link rel="stylesheet" href="<?= base_url(); ?>user_panel/new/css/owl.carousel.min.css">
</head>

<body>
    <div class="header">
        <div class="top-section" id="myHeader"><div class="nav-header">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <div class="top-logo"><a href="http://localhost/narrateme/index.php"><img
                                        src="<?= base_url(); ?>user_panel/new/images/logo.png" alt=""></a></div>
                        </div>
                        <div class="col-10">
                            <div class="right-header">

                                <div class="header-menu clearfix">

                                    <div class="menu-bar">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                                data-target="#myNavbar" aria-expanded="false">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        <div class="navbar-collapse iphonNav nav-top clearfix collapse navigation"
                                            id="myNavbar" style="display: block;">
                                            <div class="top-logo" style="display:none"><a href="<?= base_url(); ?>"><img
                                                        src="<?= base_url(); ?>user_panel/new/images/nav-logo.png"
                                                        alt=""></a></div>
                                            <div class="menu-top-menu-container">
                                                <ul>
                                                    <li><a href="http://localhost/narrateme/index.php">Home</a></li>
                                                    <li><a href="http://localhost/narrateme/page.php?id=17">About Us</a>
                                                    </li>
                                                    <li><a href="http://localhost/narrateme/page.php?id=18">Members</a>
                                                    </li>
                                                    <li><a
                                                            href="http://localhost/narrateme/page.php?id=19">Individuals</a>
                                                    </li>
                                                    <li><a href="http://localhost/narrateme/php?id=20">Students</a></li>
                                                    <li><a href="http://localhost/narrateme/page.php?id=21">Educational
                                                            Institutions</a></li>
                                                    <li><a href="http://localhost/narrateme/page.php?id=22">Instructional
                                                            Facilities &amp; Schools</a></li>
                                                    <li><a
                                                            href="http://localhost/narrateme/product_list.php">Products</a>
                                                    </li>
                                                    <li><a href="<?php echo base_url('courses/'.base64_encode($this->session->userdata('loginuserID'))) ?>">Courses</a></li>
                                                    <li><a href="http://localhost/narrateme/contact.php?id=5">Contact
                                                            Us</a></li>
                                                </ul>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>