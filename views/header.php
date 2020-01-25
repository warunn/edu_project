<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Official Web Site of Central College Piliyandala</title>

    <!-- ==== Extra Metadata ===== -->
    <!-- Site Name -->
    <meta property="og:site_name" content="test686.tk"/>
    <!-- og Title -->
    <meta property="og:title" content="Central College Piliyandala"/>
    <!-- og Description -->
    <meta property="og:description" content="Official Web Site of Central College Piliyandala"/>
    <!-- og Url -->
    <meta property="og:url" content="javascript:window.location.href=window.location.href"/>

    <!-- Type -->
    <meta property="og:type" content="article"/>
    <!-- Facebook App ID -->
    <meta property="fb:app_id" content="392736247808676">
    <!-- Main Image -->
    <meta property="og:image" content="http://www.test686.tk/views/index/img/new_side.jpg"/>
    <!-- Schema -->

    <link rel="icon" href="<?php echo URL; ?>views/index/img/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery-1.8.3.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/slider.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/jspdf.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/html2canvas.js" type="text/javascript"></script>
    <link href="<?php echo URL; ?>public/css/main.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        <!--
        a {
            color: inherit;
        }

        body {
            background-image: url(<?php echo URL; ?>views/index/img/back_banner.jpg);
            background-repeat: repeat-x;
            background-color: #ffffff;
        }

        -->
    </style>


</head>

<body>
<?php

$Student_classes = array();

function HeadergetGradeFromYear($year)
{
    $temp="";
    switch ($year) {
        case (date('Y') - 0):
            return $temp = 'Grade 6';

        case (date('Y') - 1):
            return $temp = 'Grade 7';

        case (date('Y') - 2):
            return $temp = 'Grade 8';

        case (date('Y') - 3):
            return $temp = 'Grade 9';

        case (date('Y') - 4):
            return $temp = 'Grade 10';

        case (date('Y') - 5):
            return $temp = 'Grade 11';

        case (date('Y') - 6):
            return $temp = 'Grade 12';

        case (date('Y') - 7):
            return $temp = 'Grade 13';

        default:
            return $temp = 'NO GRADES';

    }
}

$Student_classes=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P'];
?>
<div id="wrapper">
    <div id="main_banner"><a href="<?php echo URL; ?>index"><img src="<?php echo URL; ?>views/index/img/new_side.jpg"
                                                                 name="new_side" id="new_side"/></a><img id="new_up"
                                                                                                         src="<?php echo URL; ?>views/index/img/new_up.jpg"/>
        <div id="upper_buttons">
            <div class="spacer">|</div>
            <a href="<?php echo URL; ?>index">
                <div class="upper_button">

                    Home
                </div>
            </a>
            <div class="spacer">|</div>
            <a href="<?php echo URL; ?>spage/pccs">
                <div class="upper_button"> Pccs</div>
            </a>
            <div class="spacer">|</div>
            <a href="<?php echo URL; ?>spage/sports">
                <div class="upper_button"> Sports</div>
            </a>
            <div class="spacer">|</div>
            <div class="upper_button"> Societies</div>
            <div class="spacer">|</div>
            <a href="pastpupils/pastlogin.php">
                <div class="upper_button"> Past Pupils</div>
            </a>


            <script>
                $(".upper_button").hover(function () {
                    $(this).css("background-color", "#6c220f")
                }, function () {
                    $(this).css("background-color", "#963117");

                });
            </script>

        </div>
    </div>


    <div class='main-slider'>
        <?php
        $site_info = array(
            array(URL . "views/index/img/02.jpg"),
            array(URL . "views/index/img/02.jpg"),
            array(URL . "views/index/img/03.jpg"),
            array(URL . "views/index/img/04.jpg"),
            array(URL . "views/index/img/05.jpg"),
            array(URL . "views/index/img/06.jpg"),
            array(URL . "views/index/img/07.jpg"),
        );

        $slider_default_image = $site_info[0][0];
        ?>
        <div class='slider-large-image'>
            <?php
            for ($i = 0; $i < 7; $i++) {

                $slide_image = $site_info[$i][0];
                echo "<div  class='large-image' id='slider-image-" . $i . "'>
	<img  src='" . $slide_image . "' alt='advanced level ict' height='230' width='1000'/>
	</div>";
            }
            ?>
        </div>
        <script type="text/javascript">
            setTimeout('slider_select_next()', 5 * 1000);
            //slider_select_next();

        </script>

    </div>


    <div id="side_bar">

        <a href="<?php echo URL; ?>spage/principal">
            <div class="side_button"> Principal's Message</div>
        </a>

        <div class="side_button"> School Administration</div>
        <div class="side_button"> Results</div>
        <a href="<?php echo URL; ?>spage/wallpapers">
            <div class="side_button"> WallPapers</div>
        </a>
        <a href="<?php echo URL; ?>spage/oldphotos">
            <div class="side_button"> Old Photos</div>
        </a>
        <a href="<?php echo URL; ?>spage/contact">
            <div class="side_button"> Contact Us</div>
        </a>
        <?php
        $logged = Session::get('loggedin');
        if ($logged == true): ?>
            <a href="<?php echo URL ?>dashboard/<?php echo Session::get('role'); ?>">
                <div class="side_button">Main <?php echo Session::get('role'); ?> Control Panel</div>
            </a>
        <?php endif; ?>
        <?php
        $logged = Session::get('loggedin');
        if ($logged == false): ?>
            <a href="<?php echo URL; ?>login">
                <div class="side_button"> Login</div>
            </a>
        <?php else: ?>
            <a href="<?php echo URL; ?>login/logout">
                <div class="side_button"> Logout</div>
            </a>
        <?php endif; ?>
        <div class="side_button"> R&d
            <script>
                $(".side_button").hover(function () {
                    $(this).css("background-color", "#6c220f")
                }, function () {
                    $(this).css("background-color", "#963117");

                });
            </script>

        </div>

    </div>
    