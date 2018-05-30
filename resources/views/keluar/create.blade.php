@extends('main')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-info">
      <div class="box-header with-border">
      </div>
      <div class="box-body">
        <form role="form" method="POST">
          @csrf
          <!-- text input -->
          <div class="form-group">
            <label>Nomor Plat</label>
            <input type="text" class="form-control" name="nomor_plat" placeholder="Enter plat" value={{ $nomor_plat }} readonly>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <input type="text" class="form-control" name="" value="{{ $keluar->jenis }}" readonly>
          </div>
        <div class="form-group">
            <label>Petugas</label>
            <input type="text" class="form-control" name="" value="{{ $keluar->name }}" readonly>
            <input type="hidden" class="form-control" name="id_petugas" value="{{ Auth::id() }}" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_parkir" value="{{ $keluar->tgl_parkir }}" readonly>
          </div>
          <div class="form-group">
            <label>Jam Masuk</label>
            <input type="time" class="form-control" name="jam_parkir" value="{{ $keluar->jam_parkir }}" readonly>
          </div>
          <div class="form-group">
            <label>Jam Keluar</label>
            @php 
              $t  = time();
              $time = date("H:i:s",$t);
            @endphp 
            <input type="time" class="form-control" name="jam_keluar" placeholder="Enter Tarif" value="{{ $time }}" readonly>
          </div>
          <div class="form-group">
            <label>Durasi Parkir</label>
            <input type="text" class="form-control" name="durasi" value="{{ $selisih }}" readonly>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga" value="{{ $harga }}" readonly>
          </div>
          <input type="submit" class="btn btn-primary" value="Keluar!">
        </form>
      </div>
        <!-- /.box-body -->
    </div>

  </div>
</div>
@endsection

      
