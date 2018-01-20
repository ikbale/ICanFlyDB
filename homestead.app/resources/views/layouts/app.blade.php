<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICanFly</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: 'Lato';
        }

        h1{
            text-align: center;
            margin-top: 15%;
            font-size: 65px;
            color: #1565C0;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .panel-body li {
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
            }
        .panel-body:hover {
             box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
        }
        ul
            {
            list-style-type: none;
            }
        a:link{
        text-decoration: none;
                    }
                    .panel-table .panel-body{
              padding:0;
            }

            .panel-table .panel-body .table-bordered{
              border-style: none;
              margin:0;
            }

            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
                text-align:center;
                width: 100px;
            }

            .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
              border-right: 0px;
            }

            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
              border-left: 0px;
            }

            .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
              border-bottom: 0px;
            }

            .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
              border-top: 0px;
            }

            .panel-table .panel-footer .pagination{
              margin:0; 
            }

            /*
            used to vertically center elements, may need modification if you're not using default sizes.
            */
            .panel-table .panel-footer .col{
             line-height: 34px;
             height: 34px;
            }

            .panel-table .panel-heading .col h3{
             line-height: 30px;
             height: 30px;
            }

            .panel-table .panel-body .table-bordered > tbody > tr > td{
              line-height: 34px;
            }
            

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

      <div id="wrapper">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigationg</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-plane" aria-hidden="true"> </i>
                   iCanFly
               
                </a> -->
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-plane" aria-hidden="true"></i>&nbsp;&nbsp;
                   iCanFly
                     </a>
                </li> 
                     
            </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Se connecter</a></li>
                        <li><a href="{{ url('/register') }}">S'inscrire</a></li>
                    @else

                     <li><a href="{{ url('/home') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Accueil
                    </a></li>
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Espace de gestion <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/vol') }}">Gestion des vols</a></li>
                                <li><a href="{{ url('/billets') }}">Gestion des billets</a></li>
                                <li><a href="{{ url('/employees') }}">Gestion des employés</a></li>
                                <li><a href="{{ url('/clients') }}">Gestion des passagers</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                 @endif

                </ul>
            </div>

    </nav>

     </div>
        

@yield('content')

 

   


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="js/multi_step_form.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!--<script src="{{url('lib/angular/angular.js')}}"></script>
    <script src="{{url('lib/angular-route/angular-route.js')}}"></script>
    <script src="{{url('lib/angular-animate.min.js')}}"></script>-->
        

    <script type="text/javascript" src="{{url('app/app.js')}}"></script>
    

    </body>
</html>
