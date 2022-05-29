@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('title')

@endsection
@section('content')
<br />
<form method="post" action="/penjualan/toko/{{$id}}/create">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Informasi Penjualan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal"
                            value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Transaksi</label>
                        <input type="text" class="form-control" name="nota" value="{{$kode}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Pembeli</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="-">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Detail Barang</h3>
                </div>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <select name="barang_id" class="form-control form-control select2">
                            <option value="">-Pilih Barang-</option>
                            @foreach ($barang as $item)
                            <option value="{{$item->id}}">{{$item->nama}}, Stok: {{$item->stok}}, Rp.
                                {{number_format($item->harga_jual)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="jumlah" value="1" class="form-control"
                            onkeypress="return hanyaAngka(event)">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary" name="button" value="keranjang"><i
                            class="fa fa-shopping-cart"></i>
                        Tambah Ke Keranjang</button><br />
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Harga Final</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjang as $key => $item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->barang == null ? '' :$item->barang->kode}}</td>
                                <td>{{$item->barang == null ? '' :$item->barang->nama}}</td>
                                <td>Rp. {{number_format($item->harga)}}</td>
                                <td>{{round($item->diskon, 2)}} %</td>
                                <td>Rp. {{number_format($item->harga_jual)}}</td>
                                <td>Rp. {{number_format($item->jumlah)}}</td>
                                <td>Rp. {{number_format($item->total)}}</td>
                                <td><a href="/keranjang/delete/{{$item->id}}"
                                        onclick="return confirm('Yakin ingin dihapus?');"><i
                                            class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <th>Rp. {{number_format($keranjang->sum('total'))}}</th>
                                <td>
                                    <input type="hidden" name="total" value="{{$keranjang->sum('harga')}}">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">

                    <button type="submit" class="btn btn-primary" name="button" value="checkout">Checkout</button>
                    <a href="/penjualan/toko/{{$id}}/batal" onclick="return confirm('Yakin ingin dibatalkan?');"
                        class="btn btn-danger">Batal</a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</form>

@endsection
@push('js')
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });
</script>

<script src="/admin/plugins/select2/js/select2.full.min.js">
</script>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush