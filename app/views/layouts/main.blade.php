<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>AuNuTravel</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700' rel='stylesheet' type='text/css'>
  {{ HTML::style('css/bootstrap.min.css') }}
  {{ HTML::style('css/bootstrap-theme.min.css') }}
  {{ HTML::style('css/main.css') }}

  {{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}
</head>

<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">AuNuTravel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="#about"><span class="glyphicon glyphicon-user"></span> 关于我们</a></li>
            <li><a href="#contact"><span class="glyphicon glyphicon-phone-alt"></span> 联系我们</a></li>
            @if(Auth::check())
            <li>{{ HTML::link('admin/tours', '管理路线') }}</li>
            <li>{{ HTML::link('admin/orders', '管理订单') }}</li>
            <li>{{ HTML::link('users/signout', '退出') }}</li>
            @endif
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    @yield('header')

    <div class="container" id="main">
    @if (Session::has('message'))
        <br><p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
    
    @yield('pagination')
    </div><!-- end container -->

    <footer class="hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <address>
              <strong>公司地址</strong><br />
              1 George Street<br />
              Sydney, NSW 2000<br />
              <i class="glyphicon glyphicon-earphone"></i> (123) 456-7890<br />
              <i class="glyphicon glyphicon-envelope"></i> sales@aunutravel.com
            </address>
          </div>
          <div class="col-md-3">
            <address>
              <strong>公司地址</strong><br />
              1 George Street<br />
              Sydney, NSW 2000<br />
              <i class="glyphicon glyphicon-earphone"></i> (123) 456-7890<br />
              <i class="glyphicon glyphicon-envelope"></i> sales@aunutravel.com
            </address>
          </div>
          <div class="col-md-3">
            <address>
              <strong>公司地址</strong><br />
              1 George Street<br />
              Sydney, NSW 2000<br />
              <i class="glyphicon glyphicon-earphone"></i> (123) 456-7890<br />
              <i class="glyphicon glyphicon-envelope"></i> sales@aunutravel.com
            </address>
          </div>
          <div class="col-md-3">
            <address>
              <strong>公司地址</strong><br />
              1 George Street<br />
              Sydney, NSW 2000<br />
              <i class="glyphicon glyphicon-earphone"></i> (123) 456-7890<br />
              <i class="glyphicon glyphicon-envelope"></i> sales@aunutravel.com
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" id="footer-bottom">
            <div class="row">
              <div class="col-md-6 text-left" id="footer-left"><p>Copyright © 2014 AuNuTravel Company Name. All rights reserved.</p></div>
              <div class="col-md-6 text-right" id="footer-right">
                <p>Terms and conditions</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="visible-xs footer-phone">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <address>
              <strong>公司地址</strong><br />
              1 George Street<br />
              Sydney, NSW 2000<br />
              <i class="icon-white icon-signal"></i> (123) 456-7890<br />
              <i class="icon-envelope icon-white"></i> sales@aunutravel.com
            </address>
          </div>
        </div>
      </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

    {{ HTML::script('js/vendor/bootstrap.min.js') }}

    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/main.js') }}

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <!--script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
     g.src='//www.google-analytics.com/ga.js';
     s.parentNode.insertBefore(g,s)}(document,'script'));
    </script-->
  </body>
</html>











