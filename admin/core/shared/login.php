<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="fonts/caps/css/bpg-banner-caps.min.css" />
    <link href="fonts/normal/css/bpg-banner.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/modernizr.min.js"></script>
    <style>
        body{
            font-family:"BPG Banner" !important;
        }
    </style>
</head>
<body>

<div class="wrapper-page">

    <div class="text-center">
        <a href="#" class="logo-lg" style="font-family: 'BPG Banner Caps' !important;">
            <i class="mdi mdi-radar"></i> <span>სამართავი პანელი</span>
        </a>
    </div>

    <form class="form-horizontal m-t-20" action="index.php" method="post">

        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                    </div>
                    <input class="form-control" type="text" name="Username" required="" placeholder="მომხმარებელი">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                    </div>
                    <input class="form-control" type="password" name="Password" required="" placeholder="პაროლი">
                </div>
            </div>
        </div>


        <div class="form-group text-right m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">შესვლა
                </button>
            </div>
        </div>

    </form>
</div>


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap --><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
