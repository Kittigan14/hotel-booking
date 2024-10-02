@extends("layouts.master")
@section('title') Hotel | ข้อมูลห้องพัก @stop
@section('content')

<div class="container">

    <h1>รายการสินค้า </h1>

    <div class="panel panel-default">
        {{-- <div class="panel-heading" id="panel-heading">
            <div class="panel-title"><strong>รายการ</strong></div>
        </div> --}}

        <div class="panel-body">
            <form action="{{ URL::to('room/search') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="ค้นหาห้องพัก . . .">
                <button type="submit" class="btn btn-primary">ค้นหา</button>

                <a href="{{ URL::to('room/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
            </form>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>รูปห้องพัก</th>
                    <th>รหัสห้องพัก</th>
                    <th>ประเภทห้องพัก</th>
                    <th>คำอธิบาย</th>
                    <th>สถานะ</th>
                    <th>ราคาต่อคืน</th>
                    <th>การทํางาน</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $r)
                <tr>
                    <td> <img src="{{ $r->image }}"> </td>
                    <td>{{ $r->room_number }}</td>
                    <td>{{ $r->roomType ? $r->roomType->type_name : 'ไม่มีประเภทห้อง' }}</td>
                    <td>{{ $r->description }}</td>
                    <td>
                        <p class="{{ $r->availability_status ? 'bg-green' : 'bg-red' }}">
                            {{ $r->availability_status ? 'ว่าง' : 'จองแล้ว' }}
                        </p>
                    </td>
                    <td class="bs-right">{{ $r->price }}</td>
                    <td>
                        <a href="{{ URL::to('room/edit/'.$r->id) }}" class="btn btn-info">
                            <i class="fa fa-edit"></i> แก้ไข
                        </a>
            
                        <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $r->id }}">
                            <i class="fa fa-trash"></i> ลบ
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            

            <tfoot>
                <tr>
                    <th colspan="4">ห้องว่าง</th>
                    <th colspan="3">{{ $rooms->where('availability_status', 1)->count() }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="panel-footer">
            <span>แสดงข้อมูลจํานวน {{ count($rooms) }} รายการ</span>
        </div>

    </div>
    {{ $rooms->links('vendor.pagination.custom') }}
</div>

<script>
    $('.btn-delete').on('click', function() {
        if(confirm('คุณต้องการลบข้อมูลห้องพักนี้หรือไม่?')) {
            var url = "{{ URL::to('room/remove') }}" + '/' + $(this).attr('id-delete');
            window.location.href = url;
        }
    });
</script>

<style>
    .container {
    
    table tbody tr {
        transition: all .5s ease;

        td {
            img {
                width: 100%;
                height: 60px;
                border-radius: 5px;
            }
        }
    }

    .bs-right {
        text-align: right;
    }
}
</style>

@endsection
