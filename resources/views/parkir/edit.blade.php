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
            <input type="text" class="form-control" name="nomor_plat" placeholder="Enter plat" value={{  $parkir->nomor_plat }}>
          </div>
          <div class="form-group">
            <label>Petugas</label>
            <input type="text" class="form-control" name="" value="{{ $parkir->name }}" readonly>
            <input type="hidden" class="form-control" name="id_petugas" value="{{ $parkir->id_petugas }}">
          </div>
          <div class="form-group">
            <label>Jenis Kendaraan</label>
            <select name="id_jenis" class="form-control">
              @foreach($jenis as $j)
                <option value="{{ $j->id }}" {{ $j->id == $parkir->id_jenis ? "selected" : "" }}>{{ $j->jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Parkir</label>
          <input type="date" class="form-control" name="tgl_parkir" placeholder="Enter Tarif" value={{ $parkir->tgl_parkir }}>
          </div>
          <div class="form-group">
            <label>Jam Parkir</label>
            <input type="time" class="form-control" name="jam_parkir" placeholder="Enter Tarif" value="{{ $parkir->jam_parkir }}">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      </div>
        <!-- /.box-body -->
    </div>

  </div>
</div>
@endsection

      
