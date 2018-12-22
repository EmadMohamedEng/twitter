<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <title><?php echo e(config('app.name', 'Twitter')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

    <link rel="stylesheet" href="<?php echo e(url('/').'/front/'); ?>css/style.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Twitter')); ?>

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                          style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).on('submit', '#twitt_form', function (e) {
        e.preventDefault();
        var twitt_text = $('#twitt_text').val() ;
        var url = "<?php echo e(route('twitt')); ?>";

        if(twitt_text == ""){
         alert("Twitt Can't be empty");
            return false ;
        }

        $.ajaxSetup({headers: {'csrftoken': '<?php echo e(csrf_token()); ?>'}});
        $.ajax({
            method: "post",
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (res) {
                if (res.status == 'success') {
                  $("#twitt_result").append(res.data);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
              alert("Sorry,something goes wrong please try again");
            }
        });


    });


function    likeDislike(twitt_id){

    var twitt_id = twitt_id ;
    var url = "<?php echo e(route('twittLikeDislike')); ?>";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "post",
        url: url,
        data: {twitt_id:twitt_id},
        success: function (data) {
            if (data.status == 'success') {
                $("#twitt_link_"+twitt_id).html("glyphicon glyphicon-heart-empty");
                if(data.result == "add"){
                    $("#twitt_link_"+twitt_id).html("<span style='color:#FF0000'  class='glyphicon glyphicon-heart'></span>");
                }else if(data.result == "remove"){
                    $("#twitt_link_"+twitt_id).html("<span style='color:#000000'  class='glyphicon glyphicon-heart-empty'></span>");
                }


            }else if(data.status == 'fail'){
                alert('fail');
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Sorry,something goes wrong please try again");
        }
    });
    }

</script>

</body>
</html>
