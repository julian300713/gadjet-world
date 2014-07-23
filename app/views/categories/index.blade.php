@extends('layouts.main')

@section('content')
    <div id="contact-us">
        <h1>Categories Admin Panel</h1>
        <hr/>
        <p>Here you can view, delete, and create new categories.</p>
        <h2>Categories Admin Panel</h2>
        <hr/>

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item row">
                    <div class="col col-lg-4">
                        <h3>{{ $category->name }} -</h3>
                    </div>
                    <div class="col col-lg-8">
                        {{ Form::open(array('url'=>'admin/categories/destroy', 'role' => 'form')) }}
                        {{ Form::hidden('id', $category->id) }}
                        {{ Form::submit('delete', array('class'=>'pressable-button'))}}
                        {{ Form::close() }}
                    </div>
                </li>
            @endforeach
        </ul>

        <h2>Create New Category</h2>
        <!--  create form for displaying new categories  -->
        @if($errors->has())
            <div id="form-errors">
                <p class="bg-danger">the following errors have occurred</p>

                    @foreach($errors->all() as $error)
                   <h3><span class="label label-danger">{{ $error }}</span></h3>
                    @endforeach

            </div>
        @endif

        {{ Form::open(array('url'=>'admin/categories/create', 'role' => 'form', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name', array('class' => 'form-label col-lg-2')) }}
            <div class="col-lg-4">
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>



        </div>

        <div class="form-group">
            {{ Form::submit('Create Category', array('class'=>'pressable-button')) }}
            {{ Form::close() }}
        </div>



    </div><!--  end of #main  -->


@stop
