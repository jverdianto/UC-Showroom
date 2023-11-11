@extends('vehicles.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Vehicle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehicles.index') }}">Back</a>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $vehicle->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Model:</strong>
            {{ $vehicle->model }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Tahun:</strong>
            {{ $vehicle->tahun }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Jumlah Penumpang:</strong>
            {{ $vehicle->jumlah_penumpang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Manufaktur:</strong>
            {{ $vehicle->manufaktur }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Harga:</strong>
            {{ $vehicle->harga }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 cold-md-12">
        <div class="form-group">
            <strong>Jenis:</strong>
            {{ $vehicle->jenis }}
        </div>
    </div>
    @if ($vehicle->jenis === 'Mobil' && $vehicle->car)
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Tipe Bahan Bakar:</strong>
                {{ $vehicle->car->tipe_bahan_bakar }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Luas Bagasi:</strong>
                {{ $vehicle->car->luas_bagasi }}
            </div>
        </div>
    @elseif ($vehicle->jenis === 'Motor' && $vehicle->motor)
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Ukuran Bagasi:</strong>
                {{ $vehicle->motor->ukuran_bagasi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Kapasitas Bensin:</strong>
                {{ $vehicle->motor->kapasitas_bensin }}
            </div>
        </div>
    @elseif ($vehicle->jenis === 'Truk' && $vehicle->truk)
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Roda Ban:</strong>
                {{ $vehicle->truk->roda_ban }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Luas Area Kargo:</strong>
                {{ $vehicle->truk->luas_area_kargo }}
            </div>
        </div>
    @endif
</div>

@endsection