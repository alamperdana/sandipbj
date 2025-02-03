<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Akun;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class PengajuanByidExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function collection(): \Illuminate\Support\Collection
    {
        $headers = ["NAMA", "NIP", "NIK", "SERTIFIKAT", "NOMOR SK", "Jenis Pengajuan", "SKPD", "CABANG SKPD", "MASA BERLAKU", "LAMPIRAN", "LAMPIRAN TTD", "STATUS AKTIF", "KETERANGAN"];
        $data = [];
        array_push($data, $headers);
        $data_pengajuan = Pengajuan::where('pegawai_id',$this->id)->where('status_hapus',0)->get();
        foreach ($data_pengajuan as $pengajuan) {
            $akun = Akun::where('pengajuan_id',$pengajuan['id'])->orderBy('id','DESC')->first();
            $skpd_id = $pengajuan['skpd'];
            $opd_id = $pengajuan['opd'];
            $skpd = DB::select("SELECT nama_cabang, nama_skpd FROM skpd s, cabang_skpd cs
                    WHERE s.id = cs.skpd_id
                    AND s.id = $skpd_id
                    AND cs.id = $opd_id");

            if($skpd){
                $nama_skpd = $skpd[0]->nama_skpd;
                $cabang_skpd = $skpd[0]->nama_cabang;
            }else{
                $nama_skpd = '';
                $cabang_skpd = '';
            }
            
            if($akun){
                if($akun->is_active == 1) $status_aktif = 'Aktif';
                else $status_aktif = 'Tidak Aktif';
            }else{
                $status_aktif = '';
            }

            $pegawai = Pegawai::find($pengajuan['pegawai_id']);
            if ($pengajuan['lampiran_file'] != ""){
                $lampiran = asset(env('UPLOAD_PATH').$pengajuan["lampiran_file"]); 
                $lampiran2 = asset(env('UPLOAD_PATH').$pengajuan["lampiran_file"]);
                
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
                $pengajuan["type_pengajuan"], $nama_skpd, $cabang_skpd,
                $pengajuan["masa_berlaku"], $lampiran, $lampiran2, $status_aktif, $pengajuan["keterangan"]
            ]);
        }
        return New Collection($data);
    }
}