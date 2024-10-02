@extends("layouts.master")
@section('title') Hotel | Room information @stop
@section('content')

<div class="container">

    <h1>List of rooms</h1>

    <div class="panel panel-default">
        {{-- <div class="panel-heading" id="panel-heading">
            <div class="panel-title"><strong>รายการ</strong></div>
        </div> --}}

        <div class="panel-body">
            <form action="{{ URL::to('room/search') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="Search . . .">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>

                <a href="{{ URL::to('room/edit') }}" class="btn btn-success pull-right">Add Room</a>
            </form>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Room Code</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>ACtion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $r)
                <tr>
                    <td> <img src="{{ $r->image }}"> </td>
                    <td>{{ $r->room_number }}</td>
                    <td>{{ $r->roomType ? $r->roomType->type_name : 'No room type' }}</td>
                    <td>{{ $r->description }}</td>
                    <td>
                        <p class="{{ $r->availability_status ? 'bg-green' : 'bg-red' }}">
                            {{ $r->availability_status ? 'Vacant room' : 'Already reserved' }}
                        </p>
                    </td>
                    <td class="bs-right">{{ $r->price }}</td>
                    <td>
                        <a href="{{ URL::to('room/edit/'.$r->id) }}" class="btn btn-info">
                            <i class="fa fa-edit"></i> Edit
                        </a>
            
                        <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $r->id }}">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            

            <tfoot>
                <tr>
                    <th colspan="4">Vacant room</th>
                    <th colspan="3">{{ $rooms->where('availability_status', 1)->count() }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="panel-footer">
            <span>Show quantity information {{ count($rooms) }} list</span>
        </div>

    </div>
    {{ $rooms->links('vendor.pagination.custom') }}
</div>

<script>
    $('.btn-delete').on('click', function() {
        if(confirm('Do you want to delete this room information?')) {
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
