@extends("layouts.master")
@section('title') BikeShop | เพิ่มข้อมูลสินค้า @stop
@section('content')

<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="container">

    <center>
        <h1>เพิ่มสินค้า </h1>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('room') }}">หน้าแรก</a></li>
            <li class="active">เพิ่มสินค้า </li>
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

                    <strong> ข้อมูลสินค้า </strong>

                </div>

            </div>
            <div class="panel-body" id="panel-body">

                <table>

                    <tr>
                        <td>{{ Form::label('room_number', 'รหัสห้องพัก ') }}</td>
                        <td>{{ Form::text('room_number', Request::old('room_number'), ['class' => 'form-control', 'placeholder' => 'กรอกรหัสห้องพัก']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('room_type_id', 'ประเภทห้องพัก ') }}</td>
                        <td>{{ Form::select('room_type_id', $types, Request::old('room_type_id'),['class' => 'form-control']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('description', 'คำอธิบาย ') }}</td>
                        <td>{{ Form::text('description', Request::old('description'), ['class' => 'form-control', 'placeholder' => 'กรอกคำอธิบาย']) }}</td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('availability_status', 'สถานะ') }}</td>
                        <td>{{ Form::select('availability_status', [1 => 'ว่าง', 0 => 'จองแล้ว'], Request::old('availability_status', 1), ['class' => 'form-control']) }}
                        </td>
                    </tr>

                    <tr>
                        <td>{{ Form::label('price', 'ราคาต่อห้อง') }}</td>
                        <td>{{ Form::text('price', Request::old('price'), ['class' => 'form-control', 'placeholder' => 'กรอกราคา']) }}</td>
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
