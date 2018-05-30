<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;
use App\Parkir;
use DB;

class KeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = array(
            "page"  => "Keluar",
            "keluar" => DB::table("keluar")
                        ->select("users.name","keluar.*")
                        ->join("users","users.id","=", "keluar.id_petugas")
                        ->orderBy("keluar.id", "desc")
                        ->get()
        );
        return view('keluar.index', $data);
    }

    public function keluar($plat){
        $data = array(
            "page"  => "Keluar",
            "nomor_plat" => $plat,
            "keluar" => DB::table("parkir")
                        ->select("users.name","jenis.jenis", "jenis.tarif","parkir.*")
                        ->join("users","users.id","=", "parkir.id_petugas")
                        ->join("jenis","jenis.id","=", "parkir.id_jenis")
                        ->where("parkir.nomor_plat", $plat)
                        ->get()[0]
        );
        $t  = time();
        $time = date_create(date("H:i:s",$t));
        $diff  = date_diff( date_create($data['keluar']->jam_parkir), $time );
        $selisih = $diff->h.":".$diff->i.":".$diff->s;
        $data['selisih'] = $selisih;
        if($diff->h > 0)
            $harga = $diff->h * $data['keluar']->tarif;
        else
            $harga = $data['keluar']->tarif;
        $data['harga'] = $harga;
        
        return view('keluar.create', $data);
    }
    
    public function store(Request $req){
        $this->validate($req, [
            "nomor_plat"    => "required",
            "id_petugas"    => "required",
            "durasi"        => "required",
            "harga"         => "required",
            "jam_keluar"    => "required",
            "jam_parkir"    => "required",
            "tgl_parkir"    => "required",
            ]);
            
        $data = $req->All();
        
        Keluar::create($data);
        Parkir::where('nomor_plat',$req->nomor_plat)->delete();

        return redirect()->route('keluar')->with('alert-success','Berhasil Keluar!');
    }

    public function destroy($id){

        Keluar::find($id)->delete();
        
        return redirect()->route('parkir')->with('alert-success','Berhasil Menghapus data.');
    }
}
