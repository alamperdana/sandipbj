<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Cabangskpd;
use App\Models\Skpd;
use Illuminate\Http\Response;

class HomeController extends Controller {
    public function pengajuan(Request $request) 
    {
        $jabatan = Jabatan::get();
        $skpd = Skpd::get();

        $page_name = "Pengajuan";
        
        $data = $this->create_response_data(['jabatan' => $jabatan,'skpd' => $skpd],
            $page_name,
            'home.pages.pengajuan',
            $this->get_title($page_name));
        return $this->create_response($data, 'home.layout');
    }

    public function opd($skpd){
        $opd = Cabangskpd::where('skpd_id',$skpd)->get();

        return response()->json($opd);
    }

    public function submit_pengajuan(Request $request): \Illuminate\Http\RedirectResponse
    {
        /*
        foreach ($request->file('filename') as $file) {
            $name1= $file->getClientOriginalName();
             $name = time().$name1;
            //  $file->move('files', $name);
               $data[] = $name;
        }
        return $data;
    }
    */
        
        //$required_fields = [];
        $file = $request->file('file');
        //$path_1=null;
        if(isset($file)){
        $file_name = preg_replace('/\s+/', '_', $this->RandomString().$file->getClientOriginalName());
        $file->move(env('UPLOAD_PATH'),$file_name);
        }
    
        $file2 = $request->file('file2');
        //$path_1=null;
        if(isset($file2)){
        $file_name2 = preg_replace('/\s+/', '_', $this->RandomString().$file2->getClientOriginalName());
        $file2->move(env('UPLOAD_PATH'),$file_name2);
        
            /*
            $path_1 = "images/";
            $year_folder = $path . date("Y");
            $month_folder = $year_folder . '/' . date("m");
                $path_1 = "images/";
                $image_name = time().'.'.$featured->getClientOriginalName();
                $path_1 = $month_folder . '/' . $image_name;
                $featured->move(public_path($month_folder), $image_name);
            */
        }
        
    
    
        /* YANG LAMA
        $required_fields = [];
        $file = $request->file('file');
        $file_name = preg_replace('/\s+/', '_', $this->RandomString().$file->getClientOriginalName());
        $file->move(env('UPLOAD_PATH'),$file_name);
        
        $file2 = $request->file('file');
        $file_name2 = preg_replace('/\s+/', '_', $this->RandomString().$file2->getClientOriginalName());
        $file2->move(env('UPLOAD_PATH'),$file_name2);
        */

        // add pegawai
        $pegawai_data = Pegawai::where('nip', $request->input('nip'))->first();
        $id_pegawai = 0;
        if ($pegawai_data === null) {
            $pegawai = Pegawai::create( [
                'nama' => $request->input('nama'),
                'nip' => $request->input('nip'),
                'nik' => $request->input('nik'),
                'pangkat_pegawai_id' => $request->input('pangkat_pegawai_id'),
                'alamat' => $request->input('alamat'),
                'telepon' => $request->input('telepon'),
                'email' => $request->input('email'),
            ]);
            $pegawai->save();
            $id_pegawai = $pegawai->id;
        } else {
            $id_pegawai = $pegawai_data->id;
        }

        $pengajuan = Pengajuan::create([
                'pegawai_id' => $id_pegawai,
                /*'nik' => $request->input('nik'),*/
                'type_pengajuan' => $request->input('type_pengajuan'),
                'nomor_sk' => $request->input('nomor_sk'),
                'skpd' => $request->input('skpd'),
                'sertifikat' => $request->input('sertifikat'),
                'masa_berlaku' => $request->input('masa_berlaku'),
                'keterangan' => $request->input('keterangan'),
                'lampiran_file' => $file_name,
                'lampiran_ttd' => $file_name2,
                'opd' => $request->input('cabang_skpd'),
            ]);

      $pengajuan->save();
        $request->session()->flash('alert', $this->create_alert('success', 'Pengajuan terkirim!'));
        return redirect()->route('home.pengajuan');
    }

    function RandomString(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
}
