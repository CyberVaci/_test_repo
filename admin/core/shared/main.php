<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="fonts/caps/css/bpg-banner-caps.min.css" />
    <link href="fonts/normal/css/bpg-banner.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
    <!--calendar css-->
    <link href="plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
    <!-- Table Responsive css -->
    <link href="plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="plugins/custombox/dist/custombox.min.css" rel="stylesheet">

    <script src="assets/js/modernizr.min.js"></script>
    <style>
        body{
            font-family:"BPG Banner" !important;
        }
        h1,h2,h3,h4,h5
        {
            font-family:"BPG Banner Caps" !important;
        }
    </style>
</head>

<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <a href="index.php" class="logo">
                    <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                    <span class="logo-large" style="font-family: 'BPG Banner Caps' !important;">სატესტო</span>
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell noti-icon"></i>
                        </a>
                    </li>

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small class="text-white">გამარჯობა ! <?=$_SESSION["login"]?></small> </h5>
                            </div>
                            <a href="index.php?logout=1" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout"></i> <span>გასვლა</span>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <?php
        include "core/shared/navigation.php";
    ?>
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">

        <?php
            switch ($_GET["p"])
            {
                case "Order" :
                    include "core/order/order.php";
                    break;
                case "token" :
                  include "core/token/token.php";
                  break;
                default :
                    include "core/order/order.php";
                    break;
            }
        ?>

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap --><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>


<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  function changeStatus(id) {
    $.ajax({
      url: "core/token/token_status_change.php?status=2&id="+id,
      type: "get",
      success: function (response) {
        $('#action_'+id).html('<span class="badge badge-danger">disabled</span>');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }
  function tokenView(id, token)
  {
    $("#token_"+id).html("<input id='txtTokenView' type='text' style='width:300px;' value='"+token+"' /> <a href='#' onclick='focusOut("+id+");'><i class='fa fa-remove' style='color:#ff0000;'></i></a>");
  }

  function focusOut(id)
  {
    $("#token_"+id).html('<a href="#" onclick="tokenView('+id+',\''+$('#txtTokenView').val()+'\');return false;">'+$('#txtTokenView').val().substr(0,30)+'...</a>');

  }

</script>
</body>
</html>
