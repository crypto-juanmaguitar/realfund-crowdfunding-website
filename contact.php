<!DOCTYPE html>
<html>
<head>
    <title>Contact Us | Real Fund</title>
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
    <script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
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
                <div class="wrapper-box box-post-comment">
                    <h2 class="common-title">Contact Us</h2>
                    <div class="box-white">
                        <form id="contact-form" class="clearfix" action="processForm.php" method="post">
                             <p class="rs pb30">Pellentesque laoreet sapien id lacus luctus non fringilla elit lobortis. Fusce augue diam, tempor posuere pharetra sed, feugiat non sapien.</p>
                            <div class="form form-post-comment">
                                <div class="left-input">
                                    <label for="txt_name_contact">
                                        <input id="txt_name_contact" type="text" name="name" class="txt fill-width txt-name" placeholder="Enter Your Name"/>
                                    </label>
                                    <label for="txt_email_contact">
                                        <input id="txt_email_contact" type="email" name="email" class="txt fill-width txt-email" placeholder="Enter Your Email" value="info@realfund.rocks"/>
                                    </label>
                                </div>
                                <div class="right-input">
                                    <label for="txt_content_contact">
                                        <textarea name="message" id="txt_content_contact" cols="30" rows="10" class="txt fill-width" placeholder="Your message"></textarea>
                                    </label>
                                </div>
                                <div class="clear"></div>
                                <p class="rs ta-r clearfix">
									<span id="response"></span>
                                   
                                   <input type="submit" class="btn btn-white btn-submit-comment" value="Send">
                               </p>
                            </div>
                        </form>
                    </div>
                </div><!--end: .box-list-comment -->
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Contact info</h3>
                <p class="rs description pb20">Pellentesque laoreet sapien id lacus luctus non fringilla elit lobortis. Fusce augue diam, tempor posuere pharetra sed, feugiat non sapien.</p>
                <p class="rs pb20">
                    <span class="fw-b">Address</span>: 111 lorem St. 5th Floor,
                    Ipsum City, MA 00001
                </p>
                <p class="rs pb20">
                    <span class="fw-b">Phone</span>: +1 (555) 55-55-555
                    (9AM - 6PM EST)
                </p>
                <p class="rs pb20">
                    <span class="fw-b">Email</span>: <a href="mailto:info@realfund.rocks" class="be-fc-orange">info@realfund.rocks</a>
                </p>
            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
    <?php include_once("footer.php"); ?>

</div>
<?php include_once("login-popup.php"); ?>
</body>
</html>