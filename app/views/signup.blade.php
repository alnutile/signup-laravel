@extends('layout')

@section('content')
    <h1>Sign Up</h1>
    
    <!-- @todo partial this out -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif
    
    @if($errors->has())
        <div id="flash_error">
        @foreach ( $errors->all() as $error => $value)
            <div class="{{ $errors }}">{{ $value }} </div>
        @endforeach
        </div>
    @endif


    {{ Form::open(array('method' => 'post', 'route' => 'signup')) }}

    <p>
        {{ Form::label('username', 'Username') }}<br/>
        {{ Form::text('username', Input::old('username')) }}
    </p>

    <p>
        {{ Form::label('email', 'Email') }}<br/>
        {{ Form::text('email', Input::old('email')) }}
        {{ $errors->first('email') }}
    </p>
    {{ $errors->first('password', '<span class="error">:message</span>') }}

    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>

    <p>
        {{ Form::label('password_confirmation', 'Password Confirmation') }}<br/>
        {{ Form::password('password_confirmation') }}
    </p>

    <p>
        {{ Form::label('company', 'Company') }}<br/>
        {{ Form::text('company', Input::old('company')) }}
    </p>

    <p>
        {{ Form::label('firstname', 'First Name') }}<br/>
        {{ Form::text('firstname', Input::old('firstname')) }}
    </p>

    <p>
        {{ Form::label('lastname', 'Last Name') }}<br/>
        {{ Form::text('lastname', Input::old('lastname')) }}
    </p>

    <!-- submit button -->
    <p>{{ Form::submit('Sign Up') }}</p>

    {{ Form::close() }}
@stop