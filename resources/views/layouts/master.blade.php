<!doctype html>
<html>
<head>
    <title>LaravelPH community - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/one-page-wonder.css">
    <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="/"><img src="../img/laravel50px.png" alt="LaravelPH"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#about">About</a>
                    </li>

                    <li>
                        <a href="https://www.facebook.com/groups/laravelph">Join</a>
                    </li>
                     @if (!Auth::check()) 
                        <li>   
                            <a href="/auth/login">Login</a>
                        </li>
                    @else
                        <li>   
                            <a href="/auth/logout">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
       <div class="container">
           <div class="row">
            @yield('content')
           </div>    

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; LaravelPH Community 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <script type="text/javascript" src="../public/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../public/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <script type="text/javascript">
         $(function () {
             $('#datetimepicker12').datetimepicker({
                 inline: true,
                 sideBySide: true
             });
         });
    </script>

</body>
