@extends('layouts.main')

@section('content')
    <section id="signin-form">
        <h1>I have an account</h1>
        {{ Form::open(array('url'=>'users/signin')) }}
            <p>
                <i class="fa fa-envelope"></i>
                {{ Form::text('email') }}
            </p>
            <p>
                <span class="glyphicon glyphicon-lock"></span>
                {{ Form::password('password') }}
            </p>

        {{ Form::button('Sign In', array('type'=>'submit', 'pressable-button')) }}
        {{ Form::close() }}
    </section><!-- end signin-form -->
    <section id="signup">
        <h2>I'm a new customer</h2>
        <h3>You can create an account in just a few simple steps.<br>
            Click below to begin.</h3>

        {{ HTML::link('users/newaccount', 'CREATE NEW ACCOUNT', array('class'=>'pressable-button')) }}
    </section><!--- end signup -->

@stop