<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabangskpd extends Model{
    protected $table = 'cabang_skpd';
    protected $fillable = ['skpd_id', 'nama_cabang'];
}


