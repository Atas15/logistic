@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 80px !important;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Shipment Schedule Management</h2>
        <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary">Add New Shipment</a>
    </div>

    <table class="table table-striped border">
        <thead>
            <tr>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $s)
            <tr>
                <td>{{ $s->shipment_date }}</td>
                <td>{{ $s->from_city }}</td>
                <td>{{ $s->to_city }}</td>
                <td><span class="badge badge-info">{{ $s->status }}</span></td>
                <td>
                    <form action="{{ route('admin.shipments.destroy', $s->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection