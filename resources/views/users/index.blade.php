@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
    </div>
</div>
<div class='row'>
    <div class="col-md-2">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('patients.create') }}"> Create New Patient</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Doctor</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered mt-4">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Roles</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->f_name .' '. $user->m_name.' '.$user->l_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
            @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{!! $data->render() !!}

<p class="text-center text-primary"><small>CodeCamp 2019</small></p>
@endsection
