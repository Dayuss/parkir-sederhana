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
        <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
        <div class="box-header with-border">
                <a href="{{ url('jenis/create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="box-body">
                <table id="example" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Tarif</th>
                                <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                                @php $no=1 @endphp
                                @foreach($Jenis as $j)
                                <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $j->jenis }}</td>
                                        <td>{{ $j->tarif }}</td>
                                        <td>
                                        <a href="{{ route('jenis.edit', $j->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('jenis.del', $j->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus jenis ini?')">Hapus</a>
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