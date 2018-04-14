<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     

    </head>
    <body>

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><span>DANI</span>CODE</a>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-header" data-toggle="dropdown" href="#">
                                <strong>MENÚ</strong>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="../">Lista de Autores</a></li>
                                <li class="divider"></li>
                                <li><a href="web/view/frases.php">Frases</a></li>
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <!-- Imagen
                                    https://www.w3schools.com/icons/fontawesome_icons_webapp.asp
                                -->
                                <em class="fa fa-user"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li><a href="#">
                                        <div><em class="fa fa-envelope"></em> 1 New Message
                                            <span class="pull-right text-muted small">3 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-heart"></em> 12 New Likes
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                                <li class="divider"></li>
                                <li><a href="#">
                                        <div><em class="fa fa-user"></em> 5 New Followers
                                            <span class="pull-right text-muted small">4 mins ago</span></div>
                                    </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">
                                        <div><em class="fa fa-envelope"></em> Opción 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div><em class="fa fa-group"></em> Opción 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-edit"></em>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">Username</div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            
            <ul class="nav menu">
                <li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="web/view/frases.php"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
                <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                            </a></li>
                        <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                            </a></li>
                        <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                            </a></li>
                    </ul>
                </li>
                <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->



    </body>
</html>