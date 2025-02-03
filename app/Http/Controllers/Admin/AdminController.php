<?php
namespace App\Http\Controllers\Admin;

use App\Exports\PengajuanExport;
use App\Exports\PengajuanByidExport;
use App\Exports\InfoPengajuanExport;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Akun;
use App\Models\Skpd;
use App\Models\Cabangskpd;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class AdminController extends Controller {

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $admin = Admin::where([
            'username' =>  $username,
            'password' => md5($password)
        ])->get();
        if ($admin->isEmpty()) {
            $request->session()->flash('alert', $this->create_alert('danger', 'Username atau Password salah!'));
            return redirect()->back();
        }
        $request->session()->push('is_login', true);
        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        $request->session()->flash('alert', $this->create_alert('info', 'Logout berhasil!'));

        return redirect()->route('login');
    }

    public function dashboard(Request $request): \Illuminate\Http\Response
    {
        $page_name = "Dashboard";
        $data = $this->create_response_data('Selamat Datang, Admin!',
            $page_name,
            'admin.pages.dashboard',
            $this->get_title($page_name));

        return $this->create_response($data);
    }

    public function jabatan(Request $request): \Illuminate\Http\Response{
        $page_name = "Jabatan";
        $jabatan = Jabatan::all();

        $data = $this->create_response_data($jabatan,
            $page_name,
            'admin.pages.jabatan',
            $this->get_title($page_name),
            'jabatan'
        );
        return $this->create_response($data);
    }

    public function pengajuan(Request $request): \Illuminate\Http\Response
    {
        $page_name = "Pengajuan";

        if ($request->has('pegawai_id')) {
        $pengajuan = Pengajuan::where('pegawai_id', $request->get('pegawai_id'))->where('status_hapus',0)->get()->sortBy('created_at', 0, true);
        } else {
            $pengajuan = Pengajuan::all()->sortBy('created_at', 0, true);
        }

        for ($i = 0; $i < count($pengajuan); $i++) {
            // dd($pengajuan[$i]['opd']);
            $skpd = $pengajuan[$i]['skpd'];
            $opd = $pengajuan[$i]['opd'];
            $skpd = DB::select("SELECT nama_skpd, nama_cabang FROM skpd s, cabang_skpd cs
                    WHERE s.id = cs.skpd_id
                    AND s.id = $skpd
                    AND cs.id = $opd")[0];
                    // dd("trst");
            $pegawai = Pegawai::find($pengajuan[$i]['pegawai_id']);

            $pengajuan[$i]['nama_skpd'] = $skpd->nama_skpd;
            $pengajuan[$i]['nama_cabang'] = $skpd->nama_cabang;

            if ($pegawai != null) {
                $pengajuan[$i]['nama_pegawai'] = $pegawai->nama;
                $pengajuan[$i]['nip'] = $pegawai->nip;
                $pengajuan[$i]['nik'] = $pegawai->nik;
            } else {
                $pengajuan[$i]['nama_pegawai'] = null;
                $pengajuan[$i]['nip'] = null;
                $pengajuan[$i]['nik'] = null;
            }
        }

        if ($request->has('pegawai_id')) {
            $data = $this->create_response_data($pengajuan,
                $page_name,
                'admin.pages.pengajuandetail',
                $this->get_title($page_name),
                'pengajuan',
            );
        }else{
            $data = $this->create_response_data($pengajuan,
            $page_name,
            'admin.pages.pengajuan',
            $this->get_title($page_name),
            'pengajuan',
        );
        }

        return $this->create_response($data);
    }

    public function pegawai(Request $request): \Illuminate\Http\Response
    {
        $page_name = "Info Pengaju";

        if ($request->has('nip')) {
            $pegawai = Pegawai::where('nip', $request->get('nip'))->get()->sortBy('created_at', 0, true);
        } else {
            $pegawai = Pegawai::all()->sortBy('created_at', 0, true);
        }

        for ($i = 0; $i < count($pegawai); $i++) {
            $jabatan = Jabatan::find($pegawai[$i]['pangkat_pegawai_id']);

            if ($jabatan != null) {
                $pegawai[$i]['jabatan'] = $jabatan->pangkat;
                $pegawai[$i]['golongan'] = $jabatan->golongan;
                $pegawai[$i]['ruang'] = $jabatan->ruang;
            } else {
                $pegawai[$i]['jabatan'] = null;
                $pegawai[$i]['golongan'] = null;
                $pegawai[$i]['ruang'] = null;
            }
        }

        $data = $this->create_response_data($pegawai,
            $page_name,
            'admin.pages.pegawai',
            $this->get_title($page_name),
            'pegawai'
        );

        return $this->create_response($data);
    }

    public function detail_pegawai(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $detail_jabatan = Jabatan::find($pegawai->pangkat_pegawai_id);
        $akun = Akun::where('pegawai_id', $pegawai->id)->get()->sortBy('created_at', 0, true);
        
        /*$pengajuan = Pengajuan::where('pegawai_id', $pegawai->id)->get()->sortBy('created_at', 0, true);
        */
        
        $pengajuan = Pengajuan::where('pegawai_id', $pegawai->id)->where('status_hapus',0)->get()->sortBy('created_at', 0, true);


        for ($i = 0; $i < count($akun); $i++) {
            $pengajuan_ = Pengajuan::find($akun[$i]['pengajuan_id']);
            if ($pengajuan_ != null) {
                $akun[$i]['masa_berlaku'] = $pengajuan_->masa_berlaku;
                $akun[$i]['nomor_sk'] = $pengajuan_->nomor_sk;
                $akun[$i]['lampiran_file'] = $pengajuan_->lampiran_file;
                $akun[$i]['lampiran_ttd'] = $pengajuan_->lampiran_ttd;
                $akun[$i]['sertifikat'] = $pengajuan_->sertifikat;
            } else {
                $akun[$i]['masa_berlaku'] = null;
                $akun[$i]['nomor_sk'] = null;
                $akun[$i]['lampiran_file'] = null;
                $akun[$i]['lampiran_ttd'] = null;
            }
        }

        $data = [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'detail_jabatan' => $detail_jabatan,
            'akun' => $akun,
            'pengajuan' => $pengajuan
        ];

        $page_name = $pegawai->nama;
        $data = $this->create_response_data($data,
            $page_name,
            'admin.pages.detail_pegawai',
            $this->get_title($page_name), 'pegawai');

        return $this->create_response($data);
    }

    public function add_pegawai_page(Request $request): \Illuminate\Http\Response
    {
        $jabatan = Jabatan::all();
        $page_name = "Tambah Data Pegawai";
        $data = $this->create_response_data($jabatan,
            $page_name,
            'admin.pages.add_pegawai',
            $this->get_title($page_name), 'pegawai');

        return $this->create_response($data, 'admin.layout');
    }

    public function detail_jabatan(Request $request, $id): \Illuminate\Http\Response
    {
        $jabatan = Jabatan::find($id);

        $page_name = "Detail Jabatan";
        $data = $this->create_response_data($jabatan,
            $page_name,
            'admin.pages.detail_jabatan',
            $this->get_title($page_name), 'jabatan');

        return $this->create_response($data);
    }

    public function edit_akun_status(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $akun = Akun::find($id);
        $akun->is_active = $akun->is_active == 1 ? 0 : 1;
        $akun->save();
        $request->session()->flash('alert', $this->create_alert('info', 'Data berhasil diubah!'));
        return redirect()->back();
    }

    public function add_jabatan(Request $request): \Illuminate\Http\RedirectResponse
    {
        $required_fields = [];
        $jabatan = Jabatan::create([
           'pangkat'  => $request->input('pangkat'),
           'golongan'  => $request->input('golongan'),
           'ruang'  => $request->input('ruang'),
        ]);

        $jabatan->save();
        $request->session()->flash('alert', $this->create_alert('success', 'Data tersimpan!'));
        return redirect()->route('admin.jabatan');
    }

    public function add_akun(Request $request)
    {
        $id = $request->input('id');
        $required_fields = [];
        $jabatan = Akun::create([
            'user_id'  => $request->input('user_id'),
            'password'  => $request->input('password'),
            'pengajuan_id'  => $request->input('pengajuan_id'),
            'pegawai_id'  => $request->input('pegawai_id'),
        ]);

        Pengajuan::where('pegawai_id',$id)->update(['status' => 1]);

        $jabatan->save();
        $request->session()->flash('alert', $this->create_alert('success', 'Data tersimpan!'));
        return redirect()->back();
    }

    public function add_pegawai(Request $request)
    {
        $pegawai = Pegawai::create( [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'pangkat_pegawai_id' => $request->input('pangkat_pegawai_id'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'email' => $request->input('email'),
        ]);
        $pegawai->save();
        $request->session()->flash('alert', $this->create_alert('success', 'Data tersimpan!'));
        return redirect()->route('admin.pegawai');
    }

    public function delete_jabatan(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
        return redirect()->route('admin.jabatan');
    }

    public function delete_akun(Request $request, $id)
    {
        $akun = Akun::find($id);
        $akun->delete();
        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
        return redirect()->back();
    }
    
    public function export_infopengajuan(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new InfoPengajuanExport, 'Infopengajuan.xlsx');
    }


    public function delete_pegawai(Request $request, $id)
    {
        /*
        $akun = Pegawai::find($id);
        $akun->delete();
        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
        */
        $akun = Pengajuan::where('id',$id)->update(['status_hapus' => 1]);  
        return redirect()->back();
    }
    
    public function delete_pegawai2(Request $request, $id)
    {
        $akun = Pegawai::find($id);
        $akun->delete();
        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
    }

    public function delete_pengajuan(Request $request, $id)
    {
        $jabatan = Pengajuan::find($id);
        $jabatan->delete();
        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
        return redirect()->route('admin.pengajuan');
    }

    public function update_jabatan(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $jabatan = Jabatan::find($id);

        $jabatan->pangkat = $request->input('pangkat');
        $jabatan->golongan = $request->input('golongan');
        $jabatan->ruang = $request->input('ruang');

        $jabatan->save();

        $request->session()->flash('alert', $this->create_alert('info', 'Data berhasil diubah!'));
        return redirect()->route('admin.jabatan');
    }
   
      
    public function printpengajuan($id){

        // realisasis = DB::table('units')
        //                 ->join('transaksis','transaksis.kode_unit','=','units.kode_unit')                        
        //                 ->selectRaw('units.kode_unit, units.nama,SUM(transaksis.harga * transaksis.jumlah) as realisasi')->groupBy('units.kode_unit')->get();
        $printakun = DB::table('pengajuan')
                        ->join('pegawai','pegawai.id','=','pengajuan.pegawai_id')
                        ->join('akun','akun.pegawai_id','=','pengajuan.pegawai_id')
                        ->join('skpd', 'pengajuan.skpd', '=', 'skpd.id')
                        ->join('cabang_skpd','pengajuan.opd', '=', 'cabang_skpd.id')
                        //->join('pangkat_pegawai, pangkat_pegawai.pangkat_pegawai_id', '=', 'pegawai.pangkat_pegawai_id')
                        ->selectRaw('pegawai.nama, pegawai.nip, pegawai.nik, pegawai.pangkat_pegawai_id, pegawai.alamat, pegawai.telepon, pegawai.email,
                        pengajuan.type_pengajuan, pengajuan.nomor_sk, pengajuan.masa_berlaku, pengajuan.keterangan, pengajuan.sertifikat, pengajuan.lampiran_ttd, akun.user_id, akun.password,
                        skpd.nama_skpd, cabang_skpd.nama_cabang'
                        )->where('pengajuan.id',$id)->get();          
        $pangkat = DB::table('pegawai')
                        ->join('pangkat_pegawai','pegawai.pangkat_pegawai_id','=','pangkat_pegawai.id')                        
                        ->selectRaw('pangkat_pegawai.pangkat, pangkat_pegawai.golongan, pangkat_pegawai.ruang')->where('pangkat_pegawai.id', $printakun[0]->pangkat_pegawai_id)->get();
        
        
        //dd($pangkat);                
        //$printakun = pengajuan::find('nomor_sk')->get();
        //return redirect()->route('admin.printpengajuan',['printakun' => $printakun]);
        return view('admin.pages.printpengajuan',[
            'printakun' => $printakun,
            'pangkat' => $pangkat,
        ]);  
    }

    
   

/*
  public function printpengajuan($nomor_sk){
        // realisasis = DB::table('units')
        //                 ->join('transaksis','transaksis.kode_unit','=','units.kode_unit')                        
        //                 ->selectRaw('units.kode_unit, units.nama,SUM(transaksis.harga * transaksis.jumlah) as realisasi')->groupBy('units.kode_unit')->get();
        $printakun = DB::table('pengajuan')
                        ->join('pegawai','pegawai.id','=','pengajuan.pegawai_id')
                        ->join('akun','akun.pegawai_id','=','pengajuan.pegawai_id')
                        //->join('pangkat_pegawai, pangkat_pegawai.pangkat_pegawai_id', '=', 'pegawai.pangkat_pegawai_id')
                        ->selectRaw('pegawai.nama, pegawai.nip, pegawai.nik, pegawai.pangkat_pegawai_id, pegawai.alamat, pegawai.telepon, pegawai.email,
                        pengajuan.type_pengajuan, pengajuan.skpd, pengajuan.nomor_sk, pengajuan.masa_berlaku, pengajuan.keterangan, pengajuan.sertifikat, akun.user_id, akun.password'
                        )->where('pengajuan.nomor_sk', $nomor_sk)->get();    
                        
        $pangkat = DB::table('pegawai')
                        ->join('pangkat_pegawai','pegawai.pangkat_pegawai_id','=','pangkat_pegawai.id')                        
                        ->selectRaw('pangkat_pegawai.pangkat, pangkat_pegawai.golongan, pangkat_pegawai.ruang')->where('pangkat_pegawai.id', $printakun[0]->pangkat_pegawai_id)->get();
        
        //dd($pangkat);                
        //$printakun = pengajuan::find('nomor_sk')->get();
        //return redirect()->route('admin.printpengajuan',['printakun' => $printakun]);
        return view('admin.pages.printpengajuan',[
            'printakun' => $printakun,
            'pangkat' => $pangkat,
        ]);  
    }
*/

        /*
        public function print_pengajuan($request, $nomor_sk)
    {
        $jabatan = Pengajuan::find($id);
        $jabatan->delete();
        $request->session()->flash('alert', $this->create_alert('info', 'Data dihapus!'));
        return redirect()->route('admin.pengajuan');
    }
    */

    /*
    public function print($kodeunik)
    {
    // mengambil data kupk berdasarkan id yang dipilih
    $cumatest = DB::table('cumatest')->where('kodeunik',$kodeunik)->get();
    // passing data kupk yang didapat ke view print.blade.php
    return view('print',['cumatest' => $cumatest]);        
    }
    */
    

    public function update_pegawai(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $pegawai = Pegawai::find($id);

        $pegawai->nama = $request->input('nama');
        $pegawai->nip = $request->input('nip');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->telepon = $request->input('telepon');
        $pegawai->email = $request->input('email');
        $pegawai->pangkat_pegawai_id = $request->input('pangkat_pegawai_id');

        $pegawai->save();

        $request->session()->flash('alert', $this->create_alert('info', 'Data berhasil diubah!'));
        return redirect()->back();
    }

    public function export_pengajuan(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new PengajuanExport, 'pengajuan.xlsx');
    }

    public function buatAkun(Request $request): \Illuminate\Http\Response
    {
        $page_name = "Buat Akun Pengajuan";

        if ($request->has('pegawai_id')) {
            $pengajuan = Pengajuan::where('pegawai_id', $request->get('pegawai_id'))->where('status',0)->get()->sortBy('created_at', 0, true);
        } else {
            $pengajuan = Pengajuan::where('status',0)->where('status_hapus',0)->get()->sortBy('created_at', 0, true);
        }

        for ($i = 0; $i < count($pengajuan); $i++) {
            $pegawai = Pegawai::find($pengajuan[$i]['pegawai_id']);

            $skpd_id = $pengajuan[$i]['skpd'];
            $opd_id = $pengajuan[$i]['opd'];
            $skpd = DB::select("SELECT nama_cabang, nama_skpd FROM skpd s, cabang_skpd cs
                    WHERE s.id = cs.skpd_id
                    AND s.id = $skpd_id
                    AND cs.id = $opd_id");

            if($skpd){
                $pengajuan[$i]['nama_skpd'] = $skpd[0]->nama_skpd;
                $pengajuan[$i]['nama_cabang'] = $skpd[0]->nama_cabang;
            }else{
                $pengajuan[$i]['nama_skpd'] = '';
                $pengajuan[$i]['nama_cabang'] = '';
            }

            if ($pegawai != null) {
                $pengajuan[$i]['nama_pegawai'] = $pegawai->nama;
                $pengajuan[$i]['nip'] = $pegawai->nip;
                $pengajuan[$i]['nik'] = $pegawai->nik;
            } else {
                $pengajuan[$i]['nama_pegawai'] = null;
                $pengajuan[$i]['nip'] = null;
                $pengajuan[$i]['nik'] = null;
            }
        }

        $data = $this->create_response_data($pengajuan,
            $page_name,
            'admin.pages.pengajuan_buatakun',
            $this->get_title($page_name),
            'pengajuan_buatakun'
        );

        return $this->create_response($data);
    }

    public function export_pengajuan_byid($id): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new PengajuanByidExport($id), 'pengajuan.xlsx');
    }
}