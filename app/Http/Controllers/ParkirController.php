<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;
use App\User;
use App\Jenis;

use DB;
use Auth;

class ParkirController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = array(
            "page"  => "Parkir",
            "parkir" => DB::table("parkir")
                        ->select("users.name","jenis.jenis","parkir.*")
                        ->join("jenis","jenis.id","=","parkir.id_jenis")
                        ->join("users","users.id","=", "parkir.id_petugas")
                        ->orderBy("parkir.id", "desc")
                        ->get()
        );
        return view('parkir.index', $data);
    }

    public function create(){
        $id = Auth::id();
        $data = array(
            "page" => "Tambah Parkir",
            "petugas" => User::find($id),
            "jenis" => Jenis::All(),
        );
        return view('parkir.create', $data);
    }

    public function store(Request $req){
        $this->validate($req, [
            "nomor_plat"    => "required",
            "id_petugas"    => "required",
            "id_jenis"      => "required",
            "tgl_parkir"    => "required",
            "jam_parkir"    => "required",
        ]);

        $data = $req->All();

        Parkir::create($data);

        return redirect()->route('parkir')->with('alert-success','Berhasil Menambahkan Parkir!');
    }

    public function edit($id){
        $data = array(
            "page" => "Edit Parkir",
            "jenis" => Jenis::All(),
            "parkir" => DB::table("parkir")
                        ->select("users.name","parkir.*")
                        ->join("users","users.id","=", "parkir.id_petugas")
                        ->where('parkir.id', $id)
                        ->get()[0]
        );
        return view('parkir.edit', $data);
    }

    public function update(Request $req, $id){
        $this->validate($req, [
            "nomor_plat"    => "required",
            "id_petugas"    => "required",
            "id_jenis"      => "required",
            "tgl_parkir"    => "required",
            "jam_parkir"    => "required",
        ]);

        $data = $req->All();

        Parkir::find($id)->update($data);
        
        return redirect()->route('parkir')->with('alert-success','Berhasil Mengedit Parkir!');
    }

    public function destroy($id){

        Parkir::find($id)->delete();
        
        return redirect()->route('parkir')->with('alert-success','Berhasil Menghapus Parkir!');
    }

}
