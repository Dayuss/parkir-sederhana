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
            <label>Jenis Kendaraan</label>
            <input type="text" class="form-control" name="jenis" placeholder="Enter Jenis">
          </div>
          <div class="form-group">
            <label>Tarif</label>
            <input type="number" class="form-control" name="tarif" placeholder="Enter Tarif">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      </div>
        <!-- /.box-body -->
    </div>

  </div>
</div>
@endsection

      
