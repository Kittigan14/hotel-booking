<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <title>@yield("title", "Hotel | จองที่พัก")</title>
</head>

<body>

    <nav class="navbar navbar-default navbar-static-top" style="background-color: #B5C0D0;">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">Hotel</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('home') }}">หน้าแรก</a></li>
                <li><a href="{{ URL::to('room') }}">ข้อมูลห้องพัก</a></li>
                <li><a href="{{ URL::to('booking') }}">ข้อมูลการจองห้องพัก</a></li>
                <li><a href="#">รายงาน</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="like/view"><i class="fa-solid fa-heart"></i> Like
                        <span class="label label-danger">
                            {!! count(Session::get('like_items', [])) !!}
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    </nav> @yield("content")

    @if(session('msg'))
    @if(session('ok'))
    <script>
        toastr.success("{{ session('msg') }}")

    </script>

    @else
    <script>
        toastr.error("{{ session('msg') }}")

    </script>
    @endif
    @endif

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
