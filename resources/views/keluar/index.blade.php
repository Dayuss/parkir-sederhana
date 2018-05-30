@extends('main')

@section('content')
        @if(Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
        @endif

        <!-- /.row -->
        <div class="row">
        <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
                <table id="example" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>Nomor Plat</th>
                                <th>Petugas</th>
                                <th>Tanggal Parkir</th>
                                <th>Jam Parkir</th>
                                <th>Jam Keluar</th>
                                <th>Durasi</th>
                                <th>Harga</th>
                                <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                                @php $no=1 @endphp
                                @foreach($keluar as $j)
                                <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $j->nomor_plat }}</td>
                                        <td>{{ $j->name }}</td>
                                        <td>{{ $j->tgl_parkir }}</td>
                                        <td>{{ $j->jam_parkir }}</td>
                                        <td>{{ $j->jam_keluar }}</td>
                                        <td>{{ $j->durasi }}</td>
                                        <td>{{ $j->harga }}</td>
                                        <td>
                                                <a href="{{ route('keluar.del', $j->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus ini?')">Hapus</a>
                                        </td>
                                @php $no++ @endphp
                                @endforeach
                        </tbody>
                </table>
        </div>
                <!-- /.box-body -->
        </div>

        </div>
        </div>
@endsection