@extends('layouts.main')

@section('content')

    @if($errors->has())
    <div>
        <p class="bg-danger">the following errors have occurred:</p>

            @foreach($errors->all() as $error)
            <h3><span class="label label-danger">{{ $error }}</span></h3>
            @endforeach
    </div><!-- end form-errors -->

    @endif

<section id="new-account">
    <h1>Create New Account</h1>
    <div id="layout" class="row">


        {{ Form::open(array('url'=>'users/create', 'role' => 'form')) }}
            <div class="col col-lg-4">

                <div class="form-group">
                    <label for="firstname">
                        <span class="required-field">*</span>FIRST NAME
                    </label>
                    {{ Form::text('firstname', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    <label for="lastname">
                        <span class="required-field">*</span> LAST NAME:
                    </label>
                    {{ Form::text('lastname', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    <label for="email">
                        <span class="required-field">*</span> EMAIL:
                    </label>
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    <label for="password">
                        <span class="required-field">*</span> PASSWORD:
                    </label>
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>


                <div class="form-group">
                    <label for="password_confirmation">
                        <span class="required-field">*</span> CONFIRM PASSWORD:
                    </label>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    <label for="telephone">
                        <span class="required-field">*</span> TELEPHONE:
                    </label>
                    {{ Form::text('telephone', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('CREATE NEW ACCOUNT', array('class'=>'pressable-button')) }}

            </div><!--  end of left col-lg-4  -->

            <div class="col col-lg-4">


            </div><!--  end of right col-lg-4  -->

            <div class="col col-lg-4"></div>

        {{ Form::close() }}
        <!--  end of form  -->
    </div><!--  end of #new-account .row  -->
    <p>Fields marked with <span class="required-field">*</span> are required.</p>
    <hr />


</section>




@stop