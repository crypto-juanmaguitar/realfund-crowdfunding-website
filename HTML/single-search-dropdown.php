<!DOCTYPE html>
<html>
<head>
    <title>Single dropdown search | Real Fund</title>
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
                <h2 class="rs single-title">Ineteresting article</h2>
                <p class="rs post-by">by <a href="#">Jonh Doe</a></p>
                <div class="box-single-content">
                    <div class="editor-content">
                        <p>
                            <img class="img-desc" src="images/ex/th-552x152-1.jpg" alt="$DESCRIPTION">
                        </p>
                        <p>Nam sit amet est sapien, a faucibus purus. Sed commodo facilisis tempus. <span class="fc-orange">Pellentesque placerat elementum adipiscing.</span> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                        <p>Etiam quis libero odio. Donec laoreet diam sed arcu vehicula consequat. Proin faucibus pretium consequat. <span class="fw-b fc-black">Aliquam vulputate aliquet nisl</span>, a sagittis ipsum ultrices a. Nunc risus tellus, vulputate eget lobortis eget, facilisis et tortor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
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

    <div class="additional-info-line">
        <div class="container_12">
            <div class="grid_9">
                <h2 class="rs title">Vestibulum tristique, purus eget euismod vulputate, nisl erat suscipit mi!</h2>
                <p class="rs description">Duis placerat malesuada sapien, eu consequat mauris vestibulum vitae. Aliquam fermentum lorem ut leo ultricies semper. In sed ligula massa, vitae elementum mauris.</p>
            </div>
            <div class="grid_3 ta-r">
                <a class="btn bigger btn-red" href="#">Learn more</a>
            </div>
            <div class="clear"></div>
        </div>
    </div><!--end: .additional-info-line -->
    <?php 
    include_once("additional-info.php");
    include_once("footer.php"); 
    ?>

</div>

<div class="popup-common" id="sys_popup_common">
    <div class="overlay-bl-bg"></div>
    <div class="container_12 pop-content">
        <div class="grid_12 wrap-btn-close ta-r">
            <i class="icon iBigX closePopup"></i>
        </div>
        <div class="grid_6 prefix_1">
            <div class="form login-form">
                <form action="#">
                    <h3 class="rs title-form">Register</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">New to Real Fund?</h4>
                        <p class="rs">A Real Fund account is required to continue.</p>
                        <div class="form-action">
                            <label for="txt_name">
                                <input id="txt_name" class="txt fill-width" type="text" placeholder="Enter full name"/>
                            </label>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="txt_email">
                                        <input id="txt_email" class="txt fill-width" type="email" placeholder="Enter your e-mail address"/>
                                    </label>
                                    <label for="txt_re_email">
                                        <input id="txt_re_email" class="txt fill-width" type="email" placeholder="Re-enter your e-mail adress"/>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="txt_password">
                                        <input id="txt_password" class="txt fill-width" type="password" placeholder="Enter password"/>
                                    </label>
                                    <label for="txt_re_password">
                                        <input id="txt_re_password" class="txt fill-width" type="password" placeholder="Re-enter password"/>
                                    </label>
                                </div>
                            </div>
                            <p class="rs pb10">By signing up, you agree to our <a href="#" class="fc-orange">terms of use</a> and <a href="#" class="fc-orange">privacy policy</a>.</p>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="submit">Register</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid_4">
            <div class="form login-form">
                <form action="#">
                    <h3 class="rs title-form">Login</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Already Have an Account?</h4>
                        <p class="rs">Please log in to continue.</p>
                        <div class="form-action">
                            <label for="txt_email_login">
                                <input id="txt_email_login" class="txt fill-width" type="email" placeholder="Enter your e-mail address"/>
                            </label>
                            <label for="txt_password_login">
                                <input id="txt_password_login" class="txt fill-width" type="password" placeholder="Enter password"/>
                            </label>

                            <label for="chk_remember" class="rs pb20 clearfix">
                                <input id="chk_remember" type="checkbox" class="chk-remember"/>
                                <span class="lbl-remember">Remember me</span>
                            </label>
                            <p class="rs ta-c pb10">
                                <button class="btn btn-red btn-submit" type="submit">Login</button>
                            </p>
                            <p class="rs ta-c">
                                <a href="#" class="fc-orange">I forgot my password</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>