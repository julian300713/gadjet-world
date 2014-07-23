@extends('layouts.main')

@section('search-keyword')

    <hr/>
    <section id="search-keyword">
    <h1>Search Results for <span>{{ $keyword }}</span></h1>
    </section><!-- end search-keyword -->
    <hr/>
@stop

@section('content')

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