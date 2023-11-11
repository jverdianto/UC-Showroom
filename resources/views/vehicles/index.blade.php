@extends('vehicles.layout')

@section('content')

<div class="text-center">
    <h1>UC Showroom</h1><br>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Vehicles</h2><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('vehicles.create') }}">Create New Vechicle</a><br>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Tahun</th>
        <th>Jumlah Penumpang</th>
        <th>Manufaktur</th>
        <th>Harga</th>
        <th>Jenis</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->tahun }}</td>
            <td>{{ $vehicle->jumlah_penumpang }}</td>
            <td>{{ $vehicle->manufaktur }}</td>
            <td>{{ $vehicle->harga }}</td>
            <td>{{ $vehicle->jenis }}</td>
            <td>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vehicles.show', $vehicle->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            {{ $vehicles->links() }}
        </div>
        <div class="pull-right">
            <br><a class="btn btn-warning" href="{{ route('customers.index') }}">Customers</a>
        </div>
    </div>
</div>

@endsection