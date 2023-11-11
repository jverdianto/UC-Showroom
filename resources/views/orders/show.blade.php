@extends('orders.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Order</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.show', $customer) }}">Back</a>
        </div>
    </div>
</div>

<br>

@if($order)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order ID:</strong>
                {{ $order->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer ID:</strong>
                {{ $order->customer->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $order->customer->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {{ $order->customer->alamat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telpon:</strong>
                {{ $order->customer->no_telpon }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Card:</strong>
                {{ $order->customer->id_card }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle ID:</strong>
                {{ $order->vehicle->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                {{ $order->vehicle->model }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun:</strong>
                {{ $order->vehicle->tahun }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Penumpang:</strong>
                {{ $order->vehicle->jumlah_penumpang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manufaktur:</strong>
                {{ $order->vehicle->manufaktur }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis:</strong>
                {{ $order->vehicle->jenis }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="mobilAttributes">
            @if($order->vehicle->jenis == 'Mobil')
                <div class="form-group">
                    <strong>Tipe Bahan Bakar:</strong>
                    {{ $order->vehicle->car->tipe_bahan_bakar ?? '' }}
                </div>
                <div class="form-group">
                    <strong>Luas Bagasi:</strong>
                    {{ $order->vehicle->car->luas_bagasi ?? '' }}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="motorAttributes">
            @if($order->vehicle->jenis == 'Motor')
                <div class="form-group">
                    <strong>Ukuran Bagasi:</strong>
                    {{ $order->vehicle->motor->ukuran_bagasi ?? '' }}
                </div>
                <div class="form-group">
                    <strong>Kapasitas Bensin:</strong>
                    {{ $order->vehicle->motor->kapasitas_bensin ?? '' }}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="trukAttributes">
            @if($order->vehicle->jenis == 'Truk')
                <div class="form-group">
                    <strong>Roda Ban:</strong>
                    {{ $order->vehicle->truk->roda_ban ?? '' }}
                </div>
                <div class="form-group">
                    <strong>Luas Area Kargo:</strong>
                    {{ $order->vehicle->truk->luas_area_kargo ?? '' }}
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Biaya:</strong>
                {{ $order->total_biaya }}
            </div>
        </div>
    </div>
@else
    <p>Order not found for this customer.</p>
@endif

<script>
    // Hide the divs if the corresponding values are empty
    if ($('#mobilAttributes').text().trim() === '') {
        $('#mobilAttributes').hide();
    }
    if ($('#motorAttributes').text().trim() === '') {
        $('#motorAttributes').hide();
    }
    if ($('#trukAttributes').text().trim() === '') {
        $('#trukAttributes').hide();
    }
</script>

@endsection