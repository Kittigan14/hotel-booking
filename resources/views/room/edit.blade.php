@extends("layouts.master")
@section('title') Hotel | Edit room information @stop
@section('content')

<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="container">

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif
    <center>
        <h1>Edit room </h1>
    
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('room') }}">Home</a></li>
            <li class="active"> Edit room </li>
        </ul>
    </center>

    {!! Form::model($room, [
    'action' => 'App\Http\Controllers\RoomController@update',
    'method' => 'post',
    'enctype' => 'multipart/form-data'
    ]) !!}

    <input type="hidden" name="id" value="{{ $room->id }}">

    <div class="main">
        <div class="panel panel-default" id="panel">
            <div class="panel-body">
                <table>
                    @if($room->image)
                    <tr class="image-row">
                        <td><img src="{{ URL::to($room->image) }}" width="100px"></td>
                    </tr>
                    @endif

                    <tr>
                        <td>{{ Form::label('room_number', 'Room Code') }} </td>
                        <td>{{ Form::text('room_number', $room->room_number, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('room_type_id', 'Room Type ') }}</td>
                        <td>{{ Form::select('room_type_id', $types, $room->room_type_id, ['class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('description', 'Description ') }}</td>
                        <td>{{ Form::text('description', $room->description, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('availability_status', 'Status') }}</td>
                        <td>{{ Form::select('availability_status', [1 => 'Vacant room', 0 => 'Already reserved'], $room->availability_status, ['class' => 'form-control']) }}
                        </td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('price', 'Price') }}</td>
                        <td>{{ Form::text('price', $room->price, ['class' => 'form-control']) }}</td>
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
