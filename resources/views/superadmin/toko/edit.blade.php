@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
EDIT TOKO
@endsection
@section('content')
<br />
<div class="row">
    <div class="col-12">
        <form method="post" action="/toko/edit/{{$data->id}}">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Data Toko</h3>
                            <div class="card-tools">
                                <a href="/toko" type="button" class="btn bg-gradient-blue btn-sm">
                                    <i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Toko</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode" value="{{$data->kode}}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Toko</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit"
                                        class="btn btn-block btn-primary"><strong>UPDATE</strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

@endpush