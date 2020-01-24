@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Patient</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{!! Form::open(array('route' => 'patients.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group">
            <strong>First Name:</strong>
            {!! Form::text('f_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <strong>Middle Name:</strong>
            {!! Form::text('m_name', null, array('placeholder' => 'Middle Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group">
            <strong>Last Name:</strong>
            {!! Form::text('l_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Date of Birth:</strong>
            {!! Form::date('dob', null, array('placeholder' => 'dd/mm/yy','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Gender:</strong>
            {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female', 'O'=>'Other'), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Emergency Contact Name:</strong>
            {!! Form::text('emergency_contact_name', null, array('placeholder' => 'Energency Contact Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Emergency Contact Phone Number:</strong>
            {!! Form::text('emergency_contact_phone', null, array('placeholder' => 'Energency Contact Number','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Phone Number:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control'))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Doctor:</strong>
            {{-- {!! Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S'); !!} --}}
            {!! Form::select('doctor_id', $doctors->pluck('f_name','id'), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

<p class="text-center text-primary"><small>Code Camp 2019</small></p>
@endsection
