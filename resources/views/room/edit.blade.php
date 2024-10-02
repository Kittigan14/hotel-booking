@extends("layouts.master")
@section('title') Hotel | แก้ไขข้อมูลห้องพัก @stop
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
        <h1>แก้ไขสินค้า </h1>
    
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('room') }}">หน้าแรก</a></li>
            <li class="active">แก้ไขสินค้า </li>
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
            {{-- <div class="panel-heading">
                <div class="panel-title">
                    <strong>ข้อมูลสินค้า </strong>
                </div>
            </div> --}}
            <div class="panel-body">
                <table>
                    @if($room->image)
                    <tr class="image-row">
                        <td><img src="{{ URL::to($room->image) }}" width="100px"></td>
                    </tr>
                    @endif

                    <tr>
                        <td>{{ Form::label('room_number', 'รหัสห้องพัก') }} </td>
                        <td>{{ Form::text('room_number', $room->room_number, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('room_type_id', 'ประเภทห้องพัก ') }}</td>
                        <td>{{ Form::select('room_type_id', $types, $room->room_type_id, ['class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('description', 'คำอธิบาย ') }}</td>
                        <td>{{ Form::text('description', $room->description, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('availability_status', 'สถานะ') }}</td>
                        <td>{{ Form::select('availability_status', [1 => 'ว่าง', 0 => 'จองแล้ว'], $room->availability_status, ['class' => 'form-control']) }}
                        </td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('price', 'ราคาต่อห้อง') }}</td>
                        <td>{{ Form::text('price', $room->price, ['class' => 'form-control']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('image', 'เลือกรูปภาพห้องพัก ') }}</td>
                        <td>{{ Form::file('image') }}</td>
                    </tr>

                </table>
            </div>

            <div class="panel-footer">
                <button type="reset" class="btn btn-danger">
                    <a style="color:#ffffff; text-decoration: none;" href="{{ URL::to('room') }}"> ยกเลิก </a>
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection
