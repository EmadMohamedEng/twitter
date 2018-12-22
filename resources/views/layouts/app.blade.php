<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Twitter') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="{{url('/').'/front/'}}css/style.css">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Twitter') }}
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
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

        @yield('content')
    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).on('submit', '#twitt_form', function (e) {
        e.preventDefault();
        var twitt_text = $('#twitt_text').val() ;
        var url = "{{ route('twitt') }}";

        if(twitt_text == ""){
         alert("Twitt Can't be empty");
            return false ;
        }

        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
        $.ajax({
            method: "post",
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (res) {
                $('#twitt_text').val("");
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
    var url = "{{ route('twittLikeDislike') }}";

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



<script>

    function updateTwitts() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('updateTwitts') }}",
            type: 'POST',
          //  dataType: 'html',
            success: function (result) {
                console.log(result.data);
                $("#twitt_result").html(result.data);
            }
        });
    }






    setInterval(function () {
        updateTwitts();
    }, 5000);

</script>


</body>
</html>


