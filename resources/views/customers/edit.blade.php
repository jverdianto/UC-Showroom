@extends('customers.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}">Back</a>
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

<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" value="{{ $customer->nama }}" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <textarea style="height:150px" name="alamat" class="form-control" placeholder="Alamat">{{ $customer->alamat }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>No Telpon:</strong>
                <input type="text" pattern="[-+0-9.()]+" value="{{ $customer->no_telpon }}" name="no_telpon" class="form-control" placeholder="No Telpon">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12">
            <div class="form-group">
                <strong>ID Card:</strong>
                <input type="text" pattern="[0-9]+" value="{{ $customer->id_card }}" name="id_card" class="form-control" placeholder="No Telpon">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection