<!--/**
 *
 * Package: l4_demo
 * Filename: main.blade.php
 * Author: solidstunna101
 * Date: 01/07/14
 * Time: 13:39
 *
 */ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gadget World</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.css')}}
    {{ HTML::style('css/custom.css')}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<section id="top-area" class="row">
    <div class="col col-lg-7">
        <h5>Phone orders 0800 5664546 | Email Us: <a href="">tsola2002@yahoo.co.uk</a></h5>
    </div>
    <div class="col col-lg-5">

    </div>

</section><!--  end of .top-area  -->

<header>
    <div class="container">

        <section id="action-bar" class="row">
            <div class="logo col col-lg-3">
                <a href="/"><h1><span class="logo-accent">G</span>adget World</h1></a>
            </div>
            <div class="list col col-lg-2 col-md-3">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b> Shop by Category</a>
                            <ul class="dropdown-menu">
                                @foreach($catnav as $cat)
                                <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="search-form col col-lg-3 col-md-4 col-sm-5">
                {{ Form::open(array('url'=>'store/search', 'method'=>'get', 'role' => 'search')) }}
                    <div class="input-group">
                        {{ Form::text('keyword', null, array('value'=>'Search & Hit Enter', 'class'=>'form-control')) }}
                        <div class="input-group-btn">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="user-menu col col-lg-2 col-md-3 col-sm-7 col-xs-6">
                @if(Auth::check())
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->firstname }} <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Order History</a></li>
                                @if(Auth::user()->admin == 1)
                                <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                @endif
                                <li><a href="#">Wishlist</a></li>
                                <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @else
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Sign In <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                                <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @endif

            </div>
            <div class="view-cart col col-lg-2 col-md-2 col-xs-6">
                <a href="store/cart"><i class="fa fa-shopping-cart"></i> View Cart</a>
            </div>
        </section>


    </div><!--  end of container  -->
</header> <!--END OF HEADER-->



<div class="extra"></div>




@yield('promo')

@yield('search-keyword')

<section id="main-content" class="container">
    @if(Session::has('message'))

    {{ Session::get('message') }}

    @endif
    <!--  yielding content so that views can use this layout file  -->
    @yield('content')
</section><!--  #main-content  -->

<!--  FOOTER SECTION  -->
<footer class="container">
    <section id="contact" class="">
        <h3>For phone orders please call <strong>1-800-000</strong>. You
            <br>can also email us at
            <a href="mailto:office@shop.com">office@shop.com</a>
        </h3>
    </section>


    <section id="links" class="row">
        <div id="my-account" class="col col-lg-2">
            <h4>MY ACCOUNT</h4>
            <ul class="fa-ul">
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Sign In</a></li>
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Sign Up</a></li>
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Order History</a></li>
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Shopping Cart</a></li>
            </ul>
        </div><!-- end my-account -->
        <div id="info" class="col col-lg-2">
            <h4>INFORMATION</h4>
            <ul class="fa-ul">
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Terms of Use</a></li>
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">Privacy Policy</a></li>
            </ul>
        </div><!-- end info -->
        <div id="extras" class="col col-lg-2">
            <h4>EXTRAS</h4>
            <ul class="fa-ul">
                <li><i class="fa-li fa fa-chevron-right"></i><a href="#">About Us</a></li>
                <li><i class="fa-li fa fa-chevron-right"></i>{{ HTML::link('store/contact', 'Contact Us') }}</li>
            </ul>
        </div><!-- end extras -->

        <div id="newsletter" class="col col-lg-6">
            <h4>NEWSLETTER SIGNUP</h4>
            <p>Please enter your email address below, dont worry we wont spam you</p>
            <form action="#" method="get">
                <input type="search" name="search" placeholder="Search by keyword" class="search">
                <input type="submit" value="Search" class="btn btn-sm">
            </form>
        </div><!-- end of newsletter -->
    </section><!-- end links -->

    <hr />

    <section class="row">
        <div id="copyright" class="col col-lg-6">
            <div id="logo">
                <a href="#"><strong><span id="logo-accent">G</span>adget World</strong></a>
            </div><!-- end logo -->
            <p id="store-desc">This is a short description of the store.</p>
            <p id="store-copy">&copy; 2014 eCommerce. Theme designed by Omatsola Isaac Sobotie.</p>
        </div><!-- end copyright -->
        <div id="connect" class="col col-lg-2">
            <h4>CONNECT WITH US</h4>
            <ul>
                <li class="twitter"><i class="fa fa-twitter-square"></i><a href="#"> Twitter</a></li>
                <li class="fb"><i class="fa fa-facebook-square"></i><a href="#"> Facebook</a></li>
            </ul>
        </div><!-- end connect -->
        <div id="payments" class=" col-lg-4">
            <h4>SUPPORTED PAYMENT METHODS</h4>
            {{ HTML::image('img/payment-methods.gif', 'Supported Payment Methods')}}
        </div><!-- end payments -->
    </section>
</footer>



<!-- modal windows -->
<div id="macbookpro" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                <h3 class="modal-title">Macbook Pro</h3>
            </div>
            <div class="modal-body">
                <p><img src="_/img/laptop-large.jpg" alt="Macbook Pro" class="img-responsive pull-left">The 11-inch MacBook Air lasts up to 9 hours between charges and the 13-inch model lasts up to an incredible 12 hours. So from your morning coffee till your evening commute, you can work unplugged. When it’s time to kick back and relax, you can get up to 9 hours of iTunes film playback on the 11-inch model and up to 12 hours on the 13-inch model. And with up to 30 days of standby time, you can go away for weeks and pick up where you left off.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ HTML::script('js/bootstrap.js')}}

<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('js/custom.js')}}

</body>
</html>
