@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user['f_name'].' '.$user['m_name'].' '.$user['l_name'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assigned Doctor:</strong>
            Dr. {{ $doctor['f_name'].' '.$doctor['m_name'].' '.$doctor['l_name'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user['email'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            {{ $user['phone'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{ $user['address'] }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Diagnosis</h2>
        </div>
    </div>
</div>

{!! Form::model($patient, ['method' => 'PATCH','route' => ['patients.update', $patient->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! Form::text('history', null, array('placeholder' => 'History','class' => 'form-control','cols' => 20, 'rows' =>10)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Medical Problems:</strong>
            {!! Form::text('medical_problems', null, array('placeholder' => 'Medical Problems','class' => 'form-control','cols' => 20, 'rows' =>10)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Diagnosis and Presctiption:</strong>
            {!! Form::text('diagnosis', null, array('placeholder' => 'Diagnosis','class' => 'form-control','cols' => 20, 'rows' =>20)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

<p class="text-center text-primary"><small>Code Camp 2019</small></p>
@endsection
