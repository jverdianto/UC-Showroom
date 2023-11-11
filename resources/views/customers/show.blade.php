@extends('customers.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}">Back</a>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $customer->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {{ $customer->nama }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            {{ $customer->alamat }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>No Telpon:</strong>
            {{ $customer->no_telpon }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>ID Card:</strong>
            {{ $customer->id_card }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-left">
                        <br><h4>Orders:</h4><br>
                    </div>
                    <div class="pull-right">
                        <br><a class="btn btn-success" href="{{ route('orders.create', ['customer' => $customer]) }}">Add New Order</a><br>
                    </div>
                </div>
            </div>
            @if ($customer->orders)
            <table class="table table-bordered">
                <tr>
                    <th>Order ID</th>
                    <th>Model Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Total Biaya</th>
                    <th width="280px">Action</th>
                </tr>
                @forelse ($customer->orders as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order->vehicle->model }}</td>
                        <td>{{ $order->vehicle->jenis }}</td>
                        <td>{{ $order['total_biaya'] }}</td>
                        <td>
                            <form action="{{ route('orders.destroy', ['customer' => $customer, 'order' => $order]) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('orders.show', ['customer' => $customer, 'order' => $order]) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('orders.edit', ['customer' => $customer, 'order' => $order->id]) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No orders found</td>
                    </tr>
                @endforelse
            </table>
            @else
                <p>No orders found</p>
            @endif
        </div>
    </div>
</div>

<br><br>

@endsection