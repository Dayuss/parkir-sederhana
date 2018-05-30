<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
        protected $table = 'keluar';
        protected $fillable = array('id_petugas','nomor_plat','durasi','harga','jam_keluar','jam_parkir','tgl_parkir');
}
