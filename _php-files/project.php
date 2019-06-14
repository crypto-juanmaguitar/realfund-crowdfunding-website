<!DOCTYPE html>
<html>
<head>
    <title> Real Fund</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/jquery.sidr.light.css"/>
    <link rel="stylesheet" href="css/responsiveslides.css"/>
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

    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.min.js"></script>
    <script type="text/javascript" src="js/pie.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/web3.min.js"></script>
    <script type="text/javascript">
        if(typeof window.web3 !== "undefined" && typeof window.web3.currentProvider !== "undefined") {
            var w3 = new Web3(window.web3.currentProvider);
        } else { }
        var web3 = new Web3(new Web3.providers.HttpProvider("https://ropsten.infura.io/UfBxFkoAY7W0g7oiLZMO"));
        var balance;
        function getBalance() {
            var address, wei, balance
            address = "0x19566E08602ba00b9C1c8cbB817458142D62C112";
            try {
                web3.eth.getBalance(address, function (error, wei) {
                    if (!error) {
                        balance = web3.fromWei(wei, 'ether');
                        document.getElementById("balance").innerHTML = balance.toFixed(3) + " ETH";
                        var total = 15;
                        var percent = Math.round((balance / total) * 100)
                        document.getElementById("percent").setAttribute("data-percent", percent );
                    }
                    drawPie()
                });
            } catch (err) {
                document.getElementById("balance").innerHTML = err;
                drawPie()
            }
            
        }

        function drawPie () {
                var values = [];
                $(".sys_circle_progress").each(function () {
                    var getDonePercent = parseInt($(this).attr("data-percent"));
                    var getPendingPercent = 100 - getDonePercent;
                    if(getPendingPercent==0){
                        values[0] = getDonePercent;
                    }else{
                        values[0] = getPendingPercent;
                        values[1]=getDonePercent;
                    }
                    document.getElementsByClassName("sys_holder_sector")[0].innerHTML = ""
                    Raphael($(this).find(".sys_holder_sector")[0], 78, 78).pieChart(39, 39, 39, values, "#cecece");
                    $(this).append('<span class="val-progress">' + $(this).attr("data-percent") + '%</span>');
                });
            };
        function getTimer() {
            var seconds = Math.floor((new Date('2019-08-19T22:00:00Z') - Date.now()) / 1000);
            var days = Math.floor(seconds / (3600*24));
            seconds  -= days*3600*24;
            var hrs   = Math.floor(seconds / 3600);
            seconds  -= hrs*3600;
            var mnts = Math.floor(seconds / 60);
            seconds  -= mnts*60;
            console.log(days+" D, "+hrs+" H, "+mnts+" Minutes, "+seconds+" Seconds");
            document.getElementById("quedan").innerHTML = days+" Días "+hrs+"h"
        }

        function pay(){
            w3.eth.sendTransaction({
                    from: w3.eth.accounts[0],
                    to: "0x19566E08602ba00b9C1c8cbB817458142D62C112",
                    value: w3.toWei(1.5, 'ether')
                }, function (error, result) {
                    if (error) {
                        document.getElementById('output').innerHTML = "Something went wrong!"
                    } else {
                        document.getElementById('output').innerHTML = "Track the payment: <a href='https://etherscan.io/tx/" + result + "'>https://etherscan.io/tx/" + result + "'"
                    }
                });
        }

        function complete() {
            getBalance()
            getTimer()
            console.log(balance)
        }
    </script>
</head>

</head>
<body onload="complete()">

<div id="wrapper">
    <header id="header">
        <div class="wrap-top-menu">
            <div class="container_12 clearfix">
                <div class="grid_12">
                    <nav class="top-menu">
                        <ul id="main-menu" class="nav nav-horizontal clearfix">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li class="sep"></li>
                            <li><a href="all-pages.php">Todo el site</a></li>
                            <li class="sep"></li>
                            <li><a href="how-it-work.php">Ayuda</a></li>
                            <li class="sep"></li>
                            <li><a href="contact.php">Contacto</a></li>

                        </ul>
                        <a id="btn-toogle-menu" class="btn-toogle-menu" href="#alternate-menu">
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                        </a>
                        <div id="right-menu">
                            <ul class="alternate-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="all-pages.php">Secciones</a></li>
                                <li><a href="how-it-work.php">Ayuda</a></li>
                                <li><a href="contact.php">Contacto</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="top-message clearfix">
                        <i class="icon iFolder"></i>
                        <span class="txt-message">Democratización y tokenización del Real Estate</span>
                        <i class="icon iX"></i>
                        <div class="clear"></div>
                    </div>
                    <i id="sys_btn_toggle_search" class="icon iBtnRed make-right"></i>
                </div>
            </div>
        </div><!-- end: .wrap-top-menu -->
        <div class="container_12 clearfix">
            <div class="grid_12 header-content">
                <div id="sys_header_right" class="header-right">
                    <div class="account-panel">
                        <a href="#" class="btn btn-red sys_show_popup_login">Registro</a>
                        <a href="#" class="btn btn-black sys_show_popup_login">Login</a>
                    </div>
                    <div class="form-search">
                        <form action="#">
                            <label for="sys_txt_keyword">
                                <input id="sys_txt_keyword" class="txt-keyword" type="text" placeholder="Busca proyectos"/>
                            </label>
                            <button class="btn-search" type="reset"><i class="icon iMagnifier"></i></button>
                            <button class="btn-reset-keyword" type="reset"><i class="icon iXHover"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-left">
                    <h1 id="logo">
                        <a href="index.php"><img src="images/logo.png" alt="Real Fund"/></a>
                    </h1>
                    <div class="main-nav clearfix">
                        <div class="nav-item">
                            <a href="#" class="nav-title">Invierte en</a>
                            <p class="rs nav-description">Grandes oportunidades</p>
                        </div>
                        <span class="sep"></span>
                        <div class="nav-item">
                            <a href="#" class="nav-title">Financia</a>
                            <p class="rs nav-description">un nuevo proyecto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--end: #header -->
    
    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="project-detail">
                <h2 class="rs project-title">Chalet en Cabo de Palos, Costa Cálida.</h2>
                <p class="rs post-by"><a href="#">Sun properties</a></p>
                <div class="project-short big-thumb">
                    <div class="top-project-info">
                        <div class="content-info-short clearfix">
                            <div class="thumb-img">
                                <div class="rslides_container">
                                  <ul class="rslides" id="slider1">
                                    <li><img src="images/ex/th-552x411-2.jpg" alt=""></li>
                                    <li><img src="images/ex/th-552x411-1.jpg" alt=""></li>
                                    <li><img src="images/ex/th-552x411-2.jpg" alt=""></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end: .top-project-info -->
                    <div class="bottom-project-info clearfix">
                        <div class="project-progress sys_circle_progress" id="percent" data-percent="27">
                            <div class="sys_holder_sector"></div>
                        </div>
                        <div class="group-fee clearfix">
                            <div class="fee-item">
                                <p class="rs lbl">Inversores</p>
                                <span class="val">del SC</span>
                            </div>
                            <div class="sep"></div>
                            <div class="fee-item">
                                <p class="rs lbl">Importe financiado</p>
                                <span id="balance" class="val"></span>
                            </div>
                            <div class="sep"></div>
                            <div class="fee-item">
                                <p class="rs lbl">Días restantes</p>
                                <span id="quedan" class="val"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="project-tab-detail tabbable accordion">
                    <ul class="nav nav-tabs clearfix">
                      <li class="active"><a href="#">El Proyecto</a></li>
                      <li><a href="#" class="be-fc-orange">Documentación (4)</a></li>
                      <li><a href="#" class="be-fc-orange">Inversores (en linea 136)</a></li>
                      <li><a href="#" class="be-fc-orange">Comentarios (4)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <h3 class="rs alternate-tab accordion-label">El Proyecto</h3>
                            <div class="tab-pane active accordion-content">
                                <div class="editor-content">
                                    <h3 class="rs title-inside">Chalet en Cabo de Palos. 1.000 ETH</h3>
                                    <p class="rs post-by"><a href="#" class="fw-b fc-gray be-fc-orange">SUN PROPERTIES</a> en <span class="fw-b fc-gray">Cabo de Palos, Región de Murcia</span></p>
                                    <p>Real Fund presenta una oportunidad única de inversión promovida por Sun Properties en el lindo pueblo marinero de Cabo de Palos, uno de los más conocidos de la Costa Cálida y situado junto a La Manga del Mar Menor.

El proyecto de Sun properties es una promoción de obra nueva de un chalet unifamiliar en parcela aislada con una superficie construida de 558m².8

El inmueble, situado en el barrio de Berruguete (C/Suspiro Verde Nº 4, con entrada a la parcela por la C/Nenúfar Nº 38) ofrece a los inversores participar de un préstamo de interés fijo. El interés anual es de 8%, con lo que no hace falta esperar a la venta del inmueble para conseguir rentabilidades. Recibirás el pago de los intereses trimestralmente.

Además, entre otros motivos por los que invertir se encuentran: Una rentabilidad total prevista de doble dígito (10%); una duración de obra nueva, con licencia de obras vigente, estimada sólo en 12 meses; aportación propia de fondos del promotor en el proyecto de 1.000 ETH. Esta promoción prevé la financiación de una importante entidad bancaria (2.000 ETH), lo que asegurará los recursos necesários para su conclusión.</p>
                                    <p></p>
                                    <p>
                                        <img class="img-desc" src="images/ex/th-552x411-2.jpg" alt="$DESCRIPTION"/>
                                        <span class="img-label">Infografía del Inmueble</span>
                                    </p>
                                    <p>Sun Properties, consolidado grupo con más de 20 años de experiencia dedicado a la promoción y gestión de activos inmobiliarios, está gestionando otras tres promociones en curso en la Costa Cálida, posicionandose como um promotor de referencia en la zona.

Esta compañía está muy involucrada en el desarrollo de productos innovadores para satisfacer la demanda y necesidades del los compradores de viviendas en el presente y futuro.

A su vez, Sun Properties cuenta con acuerdos en vigor, tanto con fondos de inversión como con constructoras reconocidas, para llevar a cabo los proyectos comentados anteriormente.</p>
                                    <div class="social-sharing">
                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                        </div>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                                        <!-- AddThis Button END -->
                                    </div>
                                </div>
                                <div class="project-btn-action">
                                    <a class="btn big btn-red" href="#">Preguntas</a>
                                    <a class="btn big btn-black" href="#">Comparte esta oportunidad</a>
                                </div>
                            </div><!--end: .tab-pane(About) -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Documentación</h3>
                            <div class="tab-pane accordion-content">
                                <div class="tab-pane-inside">
                                    <div class="list-last-post">
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/ex/th-90x90-pdf.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b">Informe de viabilidad</a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">publicado hace 2 días</p>
                                                <p class="rs description">Informe detallado realizado por la consultora RealEstate Consulting.</p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/ex/th-90x90-pdf.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b">Planos del inmueble</a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">publicado hace 5 días</p>
                                                <p class="rs description">Para descargar los planos en AutoCAD descargue el Zip siguiente.</p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/ex/th-90x90-zip.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b">Documentación complementaria</a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">publicado hace 6 días</p>
                                                <p class="rs description">Diversos archivos sobre diseños 3D y planos CAD</p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/ex/th-90x90-zip.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b">Sobre Sun Properties</a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">publicado hace 6 días</p>
                                                <p class="rs description">Información sobre la empresa</p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                    </div>
                                </div>
                            </div><!--end: .tab-pane(Updates) -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Inversores (SC)</h3>
                            <div class="tab-pane accordion-content">
                                <div class="tab-pane-inside">
                                    <div class="project-author pb20">
                                        <div class="media">
                                            <a href="#" class="thumb-left">
                                                <img src="images/avatar/th-90x90-1.jpg" alt="$USER_NAME"/>
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b">Michael Cronenberg</a></h4>
                                                <p class="rs">Torrelodones, Madrid</p>
                                                <p class="rs fc-gray">5 proyectos</p>
                                            </div>
                                        </div>
                                    </div><!--end: .project-author -->
                                    <div class="project-author pb20">
                                        <div class="media">
                                            <a href="#" class="thumb-left">
                                                <img src="images/avatar/th-90x90-2.jpg" alt="$USER_NAME"/>
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b">Lucía Gómez Chinarro</a></h4>
                                                <p class="rs">Murcia, región de Murcia</p>
                                                <p class="rs fc-gray">5 proyectos</p>
                                            </div>
                                        </div>
                                    </div><!--end: .project-author -->
                                </div>
                                <div class="project-btn-action">
                                    <a class="btn btn-red" href="#">Pregúntanos</a>
                                    <a class="btn btn-black" href="#">Recomienda este proyecto</a>
                                </div>
                            </div><!--end: .tab-pane(Backers) -->
                        </div>
                        <div>
                            <h3 class="rs active alternate-tab accordion-label">Commentarios (4)</h3>
                            <div class="tab-pane accordion-content">
                                <div class="box-list-comment">
                                    <div class="media comment-item">
                                        <a href="#" class="thumb-left">
                                            <img src="images/avatar/th-90x90-3.jpg" alt="$TITLE">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="rs comment-author">
                                                <a href="#" class="be-fc-orange fw-b">José Fernández López</a>
                                                <span class="fc-gray">dijo:</span>
                                            </h4>
                                            <p class="rs comment-content"> Me gustaría que hubiera un poco más de información financiera, ¿es posible? </p>
                                            <p class="rs time-post">hace 4 días</p>
                                        </div>
                                    </div><!--end: .comment-item -->
                                    <div class="media comment-item">
                                        <a href="#" class="thumb-left">
                                            <img src="images/avatar/th-90x90-2.jpg" alt="$TITLE">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="rs comment-author">
                                                <a href="#" class="be-fc-orange fw-b">Lucía Gómez Chinarro</a>
                                                <span class="fc-gray">dijo:</span>
                                            </h4>
                                            <p class="rs comment-content">Tengo un apartamento en esa misma zona y creo que por ese dinero será fácil venderlo</p>
                                            <p class="rs time-post">hace 6 días</p>
                                        </div>
                                    </div><!--end: .comment-item -->
                                    <div class="media comment-item lv2">
                                        <a href="#" class="thumb-left">
                                            <img src="images/avatar/th-90x90-1.jpg" alt="$TITLE">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="rs comment-author">
                                                <a href="#" class="be-fc-orange fw-b">Michael Cronenberg</a>
                                                <span class="fc-gray">dijo:</span>
                                            </h4>
                                            <p class="rs comment-content">Have you got some more infographies? My friend is thinking about buying the property</p>
                                            <p class="rs time-post">Hace 6 días</p>
                                        </div>
                                    </div><!--end: .comment-item -->
                                    <div class="media comment-item lv2">
                                        <a href="#" class="thumb-left">
                                            <img src="images/avatar/th-90x90-4.jpg" alt="$TITLE">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="rs comment-author">
                                                <a href="#" class="be-fc-orange fw-b">Lydia</a>
                                                <span class="fc-gray">dijo:</span>
                                            </h4>
                                            <p class="rs comment-content">Curabitur vel dolor ultrices ipsum dictum tristique. Praesent vitae lacus. Ut velit enim, vestibulum non, fermentum nec,</p>
                                            <p class="rs time-post">Hace 5 días</p>
                                        </div>
                                    </div><!--end: .comment-item -->
                                           </div>
                            </div><!--end: .tab-pane(Comments) -->
                        </div>
                      </div>
                </div><!--end: .project-tab-detail -->
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="project-runtime">
                <div class="box-gray">
                    <div class="project-date clearfix">
                        <i class="icon iCalendar"></i>
                        <span class="val"><span class="fw-b">Publicado: </span>19 de mayo de 2019</span>
                    </div>
                    <div class="project-date clearfix">
                        <i class="icon iClock"></i>
                        <span class="val"><span class="fw-b">Acaba el: </span>19 de agosto de 2019</span>
                    </div>
                    <a class="btn btn-green btn-buck-project" onclick="pay()" href="#">
                        <span class="lbl">Invierte en este proyecto</span>
                        <span class="desc">¡Desde solo 1 Eth!</span>
                    </a>
                    <p class="rs description">Este proyecto sólo será financiado si se consigue el capital necesario antes del 19 de Agosto, 2:05pm CEST.</p>
                </div>
            </div><!--end: .project-runtime -->
            <div class="project-author">
                <div class="box-gray">
                    <h3 class="title-box">Proyecto de</h3>
                    <div class="media">
                        <a href="#" class="thumb-left">
                            <img src="images/ex/th-90x90-1.jpg" alt="$USER_NAME"/>
                        </a>
                        <div class="media-body">
                            <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b">Sun properties</a></h4>
                            <p class="rs">Murcia, Región de Murcia</p>
                            <p class="rs fc-gray">5 proyectos</p>
                        </div>
                    </div>
                    <div class="author-action">
                        <a class="btn btn-red" href="#">Contacta conmigo</a>
                        <a class="btn btn-white" href="#">Mira mi bio</a>
                    </div>
                </div>
            </div><!--end: .project-author -->
            <div class="clear clear-2col"></div>
            <!-- div class="wrap-nav-pledge">
                <ul class="rs nav nav-pledge accordion">
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $17 or more</span>
                            <span class="count-val">(12 of 31)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (2 of 10)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li> 
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $32 or more</span>
                            <span class="count-val">(42 of 111)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (2 of 10)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="active pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $50 or more</span>
                            <span class="count-val">(7 of 13)</span>
                        </div>
                        <div class="active pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (2 of 10)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $54 or more</span>
                            <span class="count-val">(2 of 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (12 of 30)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $130 or more</span>
                            <span class="count-val">(23 of 47)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (2 of 10)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Pledge $110 or more</span>
                            <span class="count-val">(23 of 39)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="rs fw-b pb20">Ocupated (2 of 10)</p>
                                <p class="rs"><span class="fw-b">Estimated delivery:</span> Aug 2013</p>
                                <p class="rs fw-thin fc-gray pb20">Ships within the US only</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">Buck this project</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!--end: .wrap-nav-pledge -->
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
    <footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_3 about-us">
                <h3 class="rs title">Sobre nosotros</h3>
                <p class="rs description">Real Fund es la empresa líder en tokenización de activos inmobiliarios</p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:info@realfund.rocks">info@realfund.rocks</a></p>
                <p class="rs">+34 647734684</p>
            </div><!--end: .contact-info -->
            <div class="grid_3 recent-tweets">
                <h3 class="rs title">Tweets Recientes</h3>
                <div class="lst-tweets" id="sys_lst_tweets">

                </div>
            </div><!--end: .recent-tweets -->
            <div class="clear clear-2col"></div>
            <div class="grid_3 email-newsletter">
                <h3 class="rs title">Suscríbete a nuestra Newsletter</h3>
                <div class="inner">
                    <p class="rs description">Te tendremos al día con las novedades en el mercado</p>
                    <form action="#">
                        <div class="form form-email">
                            <label class="lbl" for="txt-email">
                                <input id="txt-email" type="text" class="txt fill-width" placeholder="Enter your e-mail address"/>
                            </label>
                            <button class="btn btn-green" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div><!--end: .email-newsletter -->
            <div class="grid_3">
                <h3 class="rs title">Descubre &amp; Crea</h3>
                <div class="footer-menu">
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">Qué es Real Fund</a></li>
                        <li><a class="be-fc-orange" href="#">¿Tienes un proyecto?</a></li>
                        <li><a class="be-fc-orange" href="#">Líneas maestras del proyecto</a></li>
                        <li><a class="be-fc-orange" href="#">Prensa</a></li>
                        <li><a class="be-fc-orange" href="#">Estadísticas</a></li>
                    </ul>
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">Selecciones</a></li>
                        <li><a class="be-fc-orange" href="#">Popular</a></li>
                        <li><a class="be-fc-orange" href="#">Reciente</a></li>
                        <li><a class="be-fc-orange" href="#">Nuestras joyitas</a></li>
                        <li><a class="be-fc-orange" href="#">Los más financiados</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="copyright">
            <div class="container_12">
                <div class="grid_12">
                    <a class="logo-footer" href="index.php"><img src="images/logo-2.png" alt="Real Fund"/></a>
                    <p class="rs term-privacy">
                        <a class="fw-b be-fc-orange" href="single.php">Términos y Condiciones</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="single.php">Política de privacidad</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="#">FAQ</a>
                    </p>
                    <p class="rs ta-c fc-gray-dark site-copyright"><a href="http://realfund.rocks" title="Real Fund" target="_blank">Real Fund © 2019</a>.</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </footer><!--end: #footer -->

</div>
</body>
</html>
