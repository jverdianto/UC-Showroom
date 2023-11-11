@extends('vehicles.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Vehicle</h2><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehicles.index') }}">Back</a>
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

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                <input type="text" name="model" value="{{ $vehicle->model }}" class="form-control" placeholder="Model">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Tahun:</strong>
                <input type="text" pattern="[0-9]+" value="{{ $vehicle->tahun }}" name="tahun" class="form-control" placeholder="Tahun">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Jumlah Penumpang:</strong>
                <input type="text" pattern="[0-9]+" value="{{ $vehicle->jumlah_penumpang }}" name="jumlah_penumpang" class="form-control" placeholder="Jumlah Penumpang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Manufaktur:</strong>
                <input type="text" name="manufaktur" value="{{ $vehicle->manufaktur }}" class="form-control" placeholder="Manufaktur">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="text" pattern="[0-9]+" value="{{ $vehicle->harga }}" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Jenis:</strong>
                <select name="jenis" class="form-control">
                    <option value="Mobil" @if($vehicle->jenis == 'Mobil') selected @endif>Mobil</option>
                    <option value="Motor" @if($vehicle->jenis == 'Motor') selected @endif>Motor</option>
                    <option value="Truk" @if($vehicle->jenis == 'Truk') selected @endif>Truk</option>
                </select>
            </div>
        </div>
        <div id="mobilAttributes" style="display:none;">
            <div class="col-xs-12 col-sm-12 cold-md-12">
                <div class="form-group">
                    <strong>Tipe Bahan Bakar:</strong>
                    <select name="tipe_bahan_bakar" class="form-control">
                        <option value="Pertalite" @if($vehicle->car && $vehicle->car->tipe_bahan_bakar == 'Pertalite') selected @endif>Pertalite</option>
                        <option value="Pertamax" @if($vehicle->car && $vehicle->car->tipe_bahan_bakar == 'Pertamax') selected @endif>Pertamax</option>
                        <option value="Solar" @if($vehicle->car && $vehicle->car->tipe_bahan_bakar == 'Solar') selected @endif>Solar</option>
                        <option value="Dex" @if($vehicle->car && $vehicle->car->tipe_bahan_bakar == 'Dex') selected @endif>Dex</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong>Luas Bagasi:</strong>
                    <input type="text" pattern="[0-9]+" value="{{ $vehicle->car ? $vehicle->car->luas_bagasi : '' }}" name="luas_bagasi" class="form-control" placeholder="Luas Bagasi">
                </div>
            </div>
        </div>
        <div id="motorAttributes" style="display:none;">
            <div class="col-xs-12 col-sm-12 cold-md-12">
                <div class="form-group">
                    <strong>Ukuran Bagasi:</strong>
                    <input type="text" pattern="[0-9]+" value="{{ $vehicle->motor ? $vehicle->motor->ukuran_bagasi : '' }}" name="ukuran_bagasi" class="form-control" placeholder="Ukuran Bagasi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 cold-md-12">
                <div class="form-group">
                    <strong>Kapasitas Bensin:</strong>
                    <input type="text" pattern="[0-9]+" value="{{ $vehicle->motor ? $vehicle->motor->kapasitas_bensin : '' }}" name="kapasitas_bensin" class="form-control" placeholder="Kapasitas Bensin">
                </div>
            </div>
        </div>
        <div id="trukAttributes" style="display:none;">
            <div class="col-xs-12 col-sm-12 cold-md-12">
                <div class="form-group">
                    <strong>Roda Ban:</strong>
                    <input type="text" pattern="[0-9]+" value="{{ $vehicle->truk ? $vehicle->truk->roda_ban : '' }}" name="roda_ban" class="form-control" placeholder="Roda Ban">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 cold-md-12">
                <div class="form-group">
                    <strong>Luas Area Kargo:</strong>
                    <input type="text" pattern="[0-9]+" value="{{ $vehicle->truk ? $vehicle->truk->luas_area_kargo : '' }}" name="luas_area_kargo" class="form-control" placeholder="Luas Area Kargo">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12 text-center">
            <br><button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        // Function to show additional attributes based on selected jenis
        function showAdditionalAttributes(selectedJenis) {
            // Hide all additional attribute divs
            $('[id$="Attributes"]').hide();

            // Show the div for the selected jenis
            $('#' + selectedJenis.toLowerCase() + 'Attributes').show();
        }

        // Run the function on page load with the initially selected jenis
        showAdditionalAttributes($('select[name="jenis"]').val());

        // Handle change event on the jenis select element
        $(document).on('change', 'select[name="jenis"]', function(){
            var selectedJenis = $(this).val();
            showAdditionalAttributes(selectedJenis);
        });
    });
</script>

@endsection