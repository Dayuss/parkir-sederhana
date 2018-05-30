<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;

class JenisController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = array(
            "page"  => "Jenis Kendaraan",
            "Jenis" => Jenis::orderBy('id', 'DESC')->get()
        );
        return view('jenis.index', $data);
    }

    public function create(){
        $data = array(
            "page" => "Tambah Jenis Kendaraan"
        );
        return view('jenis.create', $data);
    }

    public function store(Request $req){
        $this->validate($req, [
            'jenis' => 'required',
            'tarif' => 'required',
        ]);

        $data = $req->All();

        Jenis::create($data);

        return redirect()->route('jenis')->with('alert-success','Berhasil Menambahkan Jenis!');
    }

    public function edit($id){
        $data = array(
            "page"  => "Edit Jenis Kendaraan",
            "jenis" => Jenis::find($id)
        );
        return view('jenis.edit', $data);
    }

    public function update(Request $req, $id){
        $this->validate($req, [
            'jenis' => 'required',
            'tarif' => 'required',
        ]);

        $data = $req->All();

        Jenis::find($id)->update($data);
        
        return redirect()->route('jenis')->with('alert-success','Berhasil Mengedit Jenis!');
    }

    public function destroy($id){

        Jenis::find($id)->delete();
        
        return redirect()->route('jenis')->with('alert-success','Berhasil Menghapus Jenis!');
    }
}
