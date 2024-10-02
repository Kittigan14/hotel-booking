@extends('layouts.master')
@section('title', 'จองห้องพัก')
@section('content')

<div class="container">
    <h1>ห้องพักที่ถูกใจ</h1>
    <div class="breadcrumb">
        <li><a href="{{ URL::to('home') }}"><i class="fa fa-home"></i> หน้าร้าน</a></li>
        <li class="active">ห้องพักที่ถูกใจ</li>
    </div>

    <div class="panel panel-default">
        @if(count($like_items))
        <?php $sum_price = 0 ?>
        <?php $sum_qty = 0 ?>

        <table class="table bs-table">
            <thead>
                <tr>
                    <th>รูปห้องพัก </th>
                    <th>รหัสห้องพัก</th>
                    <th>ประเภทห้องพัก </th>
                    <th>จํานวน</th>
                    <th>ราคา</th>
                    <th width="50px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($like_items as $l)
                <tr>
                    <td><img src="{{ asset($l['image']) }}"></td>
                    <td>{{ $l['room_number'] }}</td>
                    <td>{{ $l['room_type_name'] }}</td>
                    <td>
                        <input type="number" id="quantity_{{ $l['id'] }}" name="quantity" min="1" class="form-control"
                            value="{{ $l['qty'] }}" onChange="updateQty({{ $l['id'] }}, this.value)">
                    </td>
                    <td>{{ number_format($l['price'], 0) }}</td>

                    <td>
                        <a href="{{ URL::to('like/delete/'.$l['id']) }}" class="btn btn-danger">
                            <i class="fa fa-times"></i></a>
                    </td>

                </tr>
                <?php $sum_price += $l['price'] ?>
                <?php $sum_qty += $l['qty'] ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">รวม</th>
                    <th>{{ number_format($sum_qty, 0) }}</th>
                    <th>{{ number_format($sum_price, 0) }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        @else
        <div class="panel-body"><strong>ไม่พบรายการสินค้า !</strong></div>
        @endif
    </div>
</div>

<script>
    function updateQty(id, qty) {
        window.location.href = '/like/update/' + id + '/' + qty;
    }

</script>

@endsection
