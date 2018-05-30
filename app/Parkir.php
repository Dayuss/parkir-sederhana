<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
        protected $table = 'parkir';
        protected $fillable = array('id_jenis','id_petugas','nomor_plat','tgl_parkir','jam_parkir');

}
