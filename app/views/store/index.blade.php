@extends('layouts.main')

@section('promo')

<div id="art" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#art" data-slide-to="0" class="active"></li>
        <li data-target="#art" data-slide-to="1"></li>
        <li data-target="#art" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            {{ HTML::image('img/slider_bg.jpg', 'promotion')}}


            <div class="carousel-caption">
                <h4>
                    Green Background
                </h4>

                <p>we sell all sorts of gadjets here</p>
            </div><!--  End of .carousel-caption  -->
        </div><!--  End of .item1  -->

        <div class="item">
            {{ HTML::image('img/slider_bg.jpg', 'promotion')}}

            <div class="carousel-caption">
                <h4>
                    Blue Background
                </h4>
                <p>you will not be disappointed</p>
            </div><!--  End of .carousel-caption  -->
        </div><!--  End of .item2  -->

        <div class="item">
            {{ HTML::image('img/slider_bg.jpg', 'promotion')}}

            <div class="carousel-caption">
                <h4>
                    Matte Background
                </h4>
            </div><!--  End of .carousel-caption  -->
        </div><!--  End of .item2  -->


    </div><!--  End of .carousel-inner  -->

    <!-- Controls -->
    <a class="left carousel-control" href="#art" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#art" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div><!--  end of carousel #art  -->

@stop


@section('content')

    <h2>New Products</h2>
    <hr/>

    <div id="products" class="row">
        @foreach($products as $product)
        <div class="product col col-lg-3">
            <a href="#macbookpro" data-toggle="modal">
                {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
            </a>

            <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>

            <h5>
                Availability:
                <span class="{{ Availability::displayClass($product->availability) }}">
                    {{ Availability::display($product->availability) }}
                </span>
            </h5>

            <p>
                {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">£{{ $product->price }}</span>
                    <i class="fa fa-shopping-cart"></i>
                    ADD TO CART
                </button>
                {{ Form::close() }}
            </p>


            <p class="wish">
                <a href="">
                    <i class="fa fa-file"></i>
                    Add to Wishlist
                </a>
            </p>
        </div><!--  end of .product1  -->
        @endforeach
    </div><!--  end of #products  -->

@stop
