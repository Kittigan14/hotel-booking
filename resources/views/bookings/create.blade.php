@extends('layouts.master')
@section('title', 'จองห้องพัก')

@section('content')
<div class="container">
    <h1>จองห้องพัก</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <div class="form-group">
            <label>Check-in Date</label>
            <input type="date" name="check_in_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Check-out Date</label>
            <input type="date" name="check_out_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Total Price</label>
            <input type="number" name="total_price" class="form-control" step="0.01" value="{{ $room->price }}" readonly>
        </div>

        <div class="form-group">
            <label>Booking Status</label>
            <select name="booking_status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">จองห้องพัก</button>
    </form>
</div>
@endsection
