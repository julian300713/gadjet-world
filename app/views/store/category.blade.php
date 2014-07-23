@extends('layouts.main')

@section('promo')
    <section id="promo-alt" class="row">
        <div id="promo1" class="col col-lg-7">
            <h1>The brand new MacBook Pro</h1>
            <p>With a special price, <span class="bold">today only!</span></p>
            <a href="#" class="pressable-button">READ MORE</a>
            {{ HTML::image('img/macbook.png', 'Macbook Pro')}}
        </div><!--  end of #promo1  -->

        <div id="double-promo" class="col col-lg-5">
            <div id="promo2">
                <h2>The iPhone 5 is now<br>available in our store!</h2>
                <a href="">See the full price list <i class="fa fa-angle-right"></i></a>
                {{ HTML::image('img/iphone.png', 'iPhone')}}
            </div><!--  end of #promo2  -->

            <div id="promo3">
                {{ HTML::image('img/thunderbolt.png', 'Thunderbolt')}}
                <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
            </div><!--  end of #promo3  -->
        </div>

    </section><!--  end of #promo-alt  -->
@stop

@section('content')
    <h2>{{ $category->name }}</h2>
    <hr>

    <aside id="categories-menu" class="col col-lg-3">
        <h3>CATEGORIES</h3>
        <ul  class="fa-ul">
            @foreach($catnav as $cat)
            <li><i class="fa-li fa fa-chevron-right"></i>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="products" class="col col-lg-9">
        @foreach($products as $product)
        <div class="product col col-lg-4">
            <a href="/store/view/{{ $product->id }}" data-toggle="modal">{{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}</a>

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
        </div><!--  end of #product1  -->
        @endforeach
    </div><!--  end of #products  -->
@stop
