@extends("layouts.master")
@section('title') Hotel | Add room information @stop
@section('content')

<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="container">

    <center>
        <h1>Add a room </h1>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('room') }}">Home</a></li>
            <li class="active">Add a room </li>
        </ul>
    </center>

    {!! Form::open( [
    'action' => 'App\Http\Controllers\RoomController@insert',
    'method' => 'post',
    'enctype' => 'multipart/form-data'
    ]) !!}

    <div class="main">

        <div class="panel panel-default">

            <div class="panel-heading">

                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <div class="panel-title" id="panel-title">

                    <strong> Room information </strong>

                </div>

            </div>
            <div class="panel-body" id="panel-body">

                <table>

                    <tr>
                        <td>{{ Form::label('room_number', 'Room Code ') }}</td>
                        <td>{{ Form::text('room_number', Request::old('room_number'), ['class' => 'form-control', 'placeholder' => 'Enter the room code']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('room_type_id', 'Room Type ') }}</td>
                        <td>{{ Form::select('room_type_id', $types, Request::old('room_type_id'),['class' => 'form-control']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('description', 'Description ') }}</td>
                        <td>{{ Form::text('description', Request::old('description'), ['class' => 'form-control', 'placeholder' => 'Fill in the description.']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('availability_status', 'Status') }}</td>
                        <td>{{ Form::select('availability_status', [1 => 'Vacant room', 0 => 'Already reserved'], Request::old('availability_status', 1), ['class' => 'form-control']) }}
                        </td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('price', 'Price') }}</td>
                        <td>{{ Form::text('price', Request::old('price'), ['class' => 'form-control', 'placeholder' => 'Fill in the price']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('image', 'Picture ') }}</td>
                        <td style="width: 100px;">{{ Form::file('image') }}</td>
                    </tr>

                </table>

            </div>

            <div class="panel-footer">
                <button type="reset" class="btn btn-danger">
                    <a style="color:#ffffff; text-decoration: none;" href="{{ URL::to('room') }}"> Cancel </a>
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save</button>
            </div>

        </div>
    </div>

    {!! Form::close() !!}

</div>
@endsection
