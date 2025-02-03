<?php
namespace App\Models;
class Pegawai extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'pegawai';
    protected $fillable = ['nama', 'nip', 'nik', 'pangkat_pegawai_id', 'alamat', 'telepon', 'email'];
}
