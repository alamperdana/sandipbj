<?php


namespace App\Models;


class Akun extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'akun';
    protected $fillable = ['user_id', 'password', 'pegawai_id', 'pengajuan_id', 'is_active'];
}
