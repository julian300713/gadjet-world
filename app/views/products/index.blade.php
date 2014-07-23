@extends('layouts.main')

@section('content')

<div id="contact-us">

    <h1>Products Admin Panel</h1>
    <hr/>

    <p>Here you can view, delete, and create new products.</p>


    <hr/>

    <ul class="list-group">
        @foreach($products as $product)
        <li class="list-group-item row">
            <div class="col col-lg-3">
                {{ HTML::image($product->image, $product->title, array('width'=>'50')) }}
                {{ $product->title }} -
            </div>
            <div class="col col-lg-3">
                {{ Form::open(array('url'=>'admin/products/destroy', 'class'=>'form-inline')) }}
                {{ Form::hidden('id', $product->id) }}
                {{ Form::submit('delete', array('class'=>'pressable-button')) }}
                {{ Form::close() }} -
            </div>
            <div class="col col-lg-3">
                {{ Form::open(array('url'=>'admin/products/toggle-availability', 'class'=>'form-inline'))}}
                {{ Form::hidden('id', $product->id) }}
                {{ Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), $product->availability, array('class'=>'form-control')) }}
            </div>
            <div class="col col-lg-3">
                {{ Form::submit('Update', array('class'=>'pressable-button')) }}
                {{ Form::close() }}
            </div>
        </li>
        @endforeach
    </ul>

    <h2>Create New Product</h2>

    <hr/>

    @if($errors->has())
    <div id="form-errors">
        <p class="bg-danger">the following errors have occurred:</p>

        <ul>
            @foreach($errors->all() as $error)
            <h3><span class="label label-danger">{{ $error }}</span></h3>
            @endforeach
        </ul>
    </div><!-- end form-errors -->
    @endif

    {{ Form::open(array('url'=>'admin/products/create', 'files'=>true, 'role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('category_id', 'Category', array('class' => 'form-label col-lg-2')) }}
        <div class="col-lg-4">
            {{ Form::select('category_id', $categories, null, array('class'=>'form-control')) }}
        </div>

    </div>


    <div class="form-group">
        {{ Form::label('title', 'Title', array('class' => 'form-label col-lg-2')) }}
        <div class="col-lg-4">
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
   </div>

    <div class="form-group">
        {{ Form::label('description', 'Description', array('class' => 'form-label col-lg-2')) }}
        <div class="col-lg-4">
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price', array('class' => 'form-label col-lg-2')) }}
        <div class="col-lg-4">
            {{ Form::text('price', null, array('class'=>'form-control')) }}
        </div>
   </div>

    <div class="form-group">
        {{ Form::label('image', 'Choose an image', array('class' => 'form-label col-lg-2')) }}
        <div class="col-lg-4">
            {{ Form::file('image', null, array('class'=>'form-control')) }}
        </div>

    </div>


    {{ Form::submit('Create Product', array('class'=>'pressable-button')) }}
    {{ Form::close() }}
</div><!-- end admin -->

@stop

