@extends('layouts.main')

@section('content')
    <div id="product-image" class="col col-lg-5">
        {{ HTML::image($product->image, $product->title)}}
    </div><!--  end of product image  -->

    <div id="product-details" class="col col-lg-5">
        <h1>{{ $product->title }}</h1>
        <p>{{ $product->description }}</p>

        <hr />
        {{ Form::open(array('url'=>'store/addtocart')) }}
        {{ Form::label('quantity', 'Qty') }}
        {{ Form::text('quantity', 1, array('maxlength'=>'2')) }}
        {{ Form::hidden('id', $product->id) }}

        <button type="submit" class="pressable-button">
            <i class="fa fa-shopping-cart"></i>
            ADD TO CART
        </button>
        {{ Form::close() }}

        <p class="wish">
            <a href="">
                <i class="fa fa-file"></i>
                Add to Wishlist
            </a>
        </p>
    </div><!--  end of product-details  -->

    <div id="product-info" class="col col-lg-2">
        <p class="price">£{{ $product->price }}</p>
        <p>
            Availability:
                <span class="{{ Availability::displayClass($product->availability) }}">
                    {{ Availability::display($product->availability) }}
                </span>
        </p>
        <p>Product Code: <span>{{ $product->id }}</span></p>
    </div><!--  end of product-info  -->
@stop