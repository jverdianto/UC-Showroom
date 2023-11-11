@extends('orders.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Order</h2><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.show', $customer) }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('orders.update', ['customer' => $customer, 'order' => $order]) }}" method="POST">
    @csrf
    <div class="row">
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle:</strong>
                <select name="vehicle_id" class="form-control">
                    @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ $order->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->model }} - {{ $vehicle->jenis }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="total_biaya" id="total_biaya" value="">
        <div class="col-xs-12 col-sm-12 cold-md-12 text-center">
            <br><button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection