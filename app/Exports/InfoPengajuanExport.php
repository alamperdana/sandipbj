<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Pengajuan;
use App\Models\Jabatan;
use App\Models\Akun;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class InfoPengajuanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        $headers = ["NAMA", "NIP", "NIK" , "JABATAN", "GOLONGAN", "RUANG", "TELEPON", "EMAIL", "ALAMAT", "SERTIFIKAT", "NOMOR SK", "JENIS PENGAJUAN",
                    "SKPD","CABANG SKPD","MASA BERLAKU", "LAMPIRAN", "LAMPIRAN TTD", "STATUS AKTIF","KETERANGAN"];
        $data = [];
        array_push($data, $headers);
        
        $pegawai = DB::select("SELECT * FROM pegawai pg,pengajuan pj, pangkat_pegawai ppg, akun ak, skpd sk, cabang_skpd cs
                    WHERE pg.id = pj.pegawai_id
                    AND pg.pangkat_pegawai_id = ppg.id
                    AND pj.id = ak.pengajuan_id
                    AND sk.id = pj.skpd
                    AND cs.id = pj.opd
                    AND pj.status_hapus = 0");

        foreach ($pegawai as $key => $value) {
            if($value->is_active == 1){
                $status_aktif = 'Aktif';
            }else $status_aktif = 'Tidak Aktif';

            array_push($data,[
                $value->nama, $value->nip, $value->nik, $value->pangkat,
                $value->golongan, $value->ruang, $value->telepon, 
                $value->email, $value->alamat, $value->sertifikat,
                $value->nomor_sk, $value->type_pengajuan,
                $value->nama_skpd,$value->nama_cabang,
                $value->masa_berlaku, asset(env('UPLOAD_PATH').$value->lampiran_file),
                $value->lampiran_ttd, asset(env('UPLOAD_PATH').$value->lampiran_ttd),
                $status_aktif, $value->keterangan
            ]);
        }

        return New Collection($data);
    }
}