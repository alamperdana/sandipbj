<?php


namespace App\Models;


class Pengajuan extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'pengajuan';
    protected $fillable = ['pegawai_id', 'skpd' ,'type_pengajuan', 'nomor_sk', 'lampiran_file', 'lampiran_ttd','masa_berlaku', 'sertifikat', 'keterangan', 'opd', 'skpd'];
}
