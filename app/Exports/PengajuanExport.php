<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Akun;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengajuanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        $headers = ["NAMA", "NIP", "NIK", "SERTIFIKAT", "NOMOR SK", "Jenis Pengajuan", "SKPD", "MASA BERLAKU", "LAMPIRAN", "LAMPIRAN TTD", "STATUS AKTIF", "KETERANGAN"];
        $data = [];
        array_push($data, $headers);
        $data_pengajuan = Pengajuan::all();
        foreach ($data_pengajuan as $pengajuan) {
            $akun = Akun::where('pengajuan_id',$pengajuan['id'])->orderBy('id','DESC')->first();
            
            if($akun){
                if($akun->is_active == 1) $status_aktif = 'Aktif';
                else $status_aktif = 'Tidak Aktif';
            }else{
                $status_aktif = '';
            }


            $pegawai = Pegawai::find($pengajuan['pegawai_id']);
            if ($pengajuan['lampiran_file'] != ""){
                $lampiran = asset(env('UPLOAD_PATH').$pengajuan["lampiran_file"]);
            }
            
            if ($pengajuan['lampiran_ttd'] != ""){
                $lampiran2 = asset(env('UPLOAD_PATH').$pengajuan["lampiran_ttd"]);
            
            } else{
                $lampiran = "";
                $lampiran2 = "";
            }

            if ($pegawai != null){
                $pengajuan['nama'] = $pegawai->nama;
                $pengajuan['nip'] = $pegawai->nip;
                $pengajuan['nik'] = $pegawai->nik;
            } else {
                $pengajuan['nama'] = "";
                $pengajuan['nip'] = "";
                $pengajuan['nik'] = "";
            }

            array_push($data, [
                $pengajuan["nama"], $pengajuan["nip"], $pengajuan["nik"],$pengajuan["sertifikat"],
                $pengajuan["nomor_sk"],
                $pengajuan["type_pengajuan"], $pengajuan["skpd"],
                $pengajuan["masa_berlaku"], $lampiran, $lampiran2, $status_aktif, $pengajuan["keterangan"]
            ]);
        }
        return New Collection($data);
    }
}