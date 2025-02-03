<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model{
    protected $table = 'pangkat_pegawai';
    protected $fillable = ['pangkat', 'golongan', 'ruang'];
}


