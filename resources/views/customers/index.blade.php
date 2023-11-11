@extends('customers.layout')

@section('content')

<div class="text-center">
    <h1>UC Showroom</h1><br>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Customers</h2><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('customers.create') }}">Create New Customer</a><br>
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
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telpon</th>
        <th>ID Card</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->nama }}</td>
            <td>{{ $customer->alamat }}</td>
            <td>{{ $customer->no_telpon }}</td>
            <td>{{ $customer->id_card }}</td>
            <td>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('customers.show', $customer->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
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
            {{ $customers->links() }}
        </div>
        <div class="pull-right">
            <br><a class="btn btn-warning" href="{{ route('vehicles.index') }}">Vehicles</a>
        </div>
    </div>
</div>

@endsection