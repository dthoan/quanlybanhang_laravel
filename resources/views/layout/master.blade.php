<!doctype html>
<html lang="en">
<head>
    <base href="{{asset('')}}"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Web Layout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        {{--    css--}}
    <link rel="stylesheet" href="css/cssMenuLeft.css">
    <style>
    .carousel-inner img {
    width: 100%;
    height: 100%;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div  class="header">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand -->
                <a class="navbar-brand" href="#">Logo</a>

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Dropdown link
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <div >

                <div id="myCarousel" class="carousel slide">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li class="item1 active"></li>
                        <li class="item2"></li>
                        <li class="item3"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.w3schools.com/bootstrap4/chicago.jpg" alt="Los Angeles" width="1100" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago" width="1100" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/la.jpg" alt="New York" width="1100" height="500">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>


        </div>

        {{--        menu left--}}
        <div id="menuleft">
            <div class="main">
                <aside>
                    <div class="sidebar left ">
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p>bootstrap develop</p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                        <ul class="list-sidebar bg-defoult">
                            <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboards </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                                <ul class="sub-menu collapse" id="dashboard">
                                    <li class="active"><a href="#">CSS3 Animation</a></li>
                                    <li><a href="#">General</a></li>
                                    <li><a href="#">Buttons</a></li>
                                    <li><a href="#">Tabs & Accordions</a></li>
                                    <li><a href="#">Typography</a></li>
                                    <li><a href="#">FontAwesome</a></li>
                                    <li><a href="#">Slider</a></li>
                                    <li><a href="#">Panels</a></li>
                                    <li><a href="#">Widgets</a></li>
                                    <li><a href="#">Bootstrap Model</a></li>
                                </ul>
                            </li>
                            <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a> </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span> <span class="fa fa-chevron-left pull-right"></span> </a>
                                <ul class="sub-menu collapse" id="products">
                                    <li class="active"><a href="#">CSS3 Animation</a></li>
                                    <li><a href="#">General</a></li>
                                    <li><a href="#">Buttons</a></li>
                                    <li><a href="#">Tabs & Accordions</a></li>
                                    <li><a href="#">Typography</a></li>
                                    <li><a href="#">FontAwesome</a></li>
                                    <li><a href="#">Slider</a></li>
                                    <li><a href="#">Panels</a></li>
                                    <li><a href="#">Widgets</a></li>
                                    <li><a href="#">Bootstrap Model</a></li>
                                </ul>
                            </li>
                            <li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa fa-chevron-left pull-right"></span></a>
                                <ul  class="sub-menu collapse" id="tables" >
                                    <li><a href=""> Static Tables</a></li>
                                    <li><a href=""> Data Tables</a></li>
                                    <li><a href=""> Foo Tables</a></li>
                                    <li><a href=""> jqGrid</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa fa-chevron-left pull-right"></span></a>
                                <ul  class="sub-menu collapse" id="e-commerce" >
                                    <li><a href=""> Products grid</a></li>
                                    <li><a href=""> Products list</a></li>
                                    <li><a href="">Product edit</a></li>
                                    <li><a href=""> Product detail</a></li>
                                    <li><a href="">Cart</a></li>
                                    <li><a href=""> Orders</a></li>
                                    <li><a href=""> Credit Card form</a> </li>
                                </ul>
                            </li>
                            <li> <a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span> </a></li>
                            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                        </ul>
                    </div>
                </aside>
            </div>
        {{--      and  menu left--}}
       <div class="container">
           <div class="row">
               <div class="col-md-4">
                   <div>Tất cả các ngôn ngữ</div>
                   <ul>
                       <li><a href="trangchu">Trang chủ</a></li>
                       <li><a href="trangchu/html">Học HTML</a></li>
                       <li><a href="trangchu/php">Học PHP</a></li>
                   </ul>
               </div>
               <div class="col-md-8" style="height: 1000px">
                   @yield("content")
               </div>
           </div>
       </div>
    </div>

</body>
<script>
    $(document).ready(function(){
        // Activate Carousel
        $("#myCarousel").carousel();

        // Enable Carousel Indicators
        $(".item1").click(function(){
            $("#myCarousel").carousel(0);
        });
        $(".item2").click(function(){
            $("#myCarousel").carousel(1);
        });
        $(".item3").click(function(){
            $("#myCarousel").carousel(2);
        });

        // Enable Carousel Controls
        $(".carousel-control-prev").click(function(){
            $("#myCarousel").carousel("prev");
        });
        $(".carousel-control-next").click(function(){
            $("#myCarousel").carousel("next");
        });
    });
</script>
</html>


