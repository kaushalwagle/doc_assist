@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Patient Management</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $patient)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $patient->f_name .' '. $patient->m_name.' '.$patient->l_name }}</td>
        <td>{{ $patient->email }}</td>
        <td>{{ $patient->phone }}</td>

        <td>
            <a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('patients.edit',$patient->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>

{!! $data->render() !!}

<p class="text-center text-primary"><small>CodeCamp 2019</small></p>
@endsection
