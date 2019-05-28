<!DOCTYPE html>
<html>
<head>
    <title>All pages | Real Fund</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/jquery.sidr.light.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="css/ie7.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->
    <link rel="stylesheet" href="css/responsive.css"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<div id="wrapper">
<?php include_once("header.php"); ?>

    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title">All HTML Pages</h2>
                <div class="box-single-content">
                    <div class="editor-content">
                        <ul style="list-style: decimal">
							<li><a target="_blank" href="index.php">Home</a></li>
							<li><a target="_blank" href="project.php">Project</a></li>
							<li><a target="_blank" href="search-results.php">Search result</a></li>
							<li><a target="_blank" href="single.php">Single</a></li>
							<li><a target="_blank" href="single-search-dropdown.php">Single dropdown search</a></li>
							<li><a target="_blank" href="how-it-work.php">How it work</a></li>
							<li><a target="_blank" href="profile.php">Profile</a></li>
							<li><a target="_blank" href="blog.php">Blog</a></li>
							<li><a target="_blank" href="category.php">Category</a></li>
							<li><a target="_blank" href="post.php">Post</a></li>
							<li><a target="_blank" href="day-news.php">Day news</a></li>
							<li><a target="_blank" href="contact.php">Contact</a></li>
						</ul>
                        <!-- AddThis Button BEGIN -->
                        <div class="social-sharing">
                            <div class="addthis_toolbox addthis_default_style">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                        </div><!-- AddThis Button END -->
                    </div>
                </div>
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Sections</h3>
                <p class="rs description pb20">Pellentesque laoreet sapien id lacus luctus non fringilla elit lobortis. Fusce augue diam, tempor posuere pharetra sed, feugiat non sapien.</p>
                <ul class="rs nav nav-category">
                    <li>
                        <a href="#">
                            About
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            How It Works
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Membership
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Success Stories
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Press
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Games
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Stats
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-gray">
                <h3 class="title-box">Text Widget</h3>
                <p class="rs description pb20">Nam sollicitudin malesuada dapibus. Suspendisse mollis pellentesque eros. Aenean congue tempor neque, vel malesuada augue auctor in. In aliquam faucibus interdum.</p>
                <a class="btn bigger fill-width btn-white" href="#">Large download button</a>
                <a class="btn bigger fill-width btn-blue" href="#">Large download button</a>

            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>

    <?php 
    include_once("additional-info.php");
    include_once("footer.php"); 
    ?>

</div>
<?php include_once("login-popup.php"); ?>
</body>
</html>