<div class="row">
    @if(session()->has('alert'))
        <div class="col-md-12">
            @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
            'message' => json_decode(session()->get('alert'))->message])
        </div>
    @endif
    <div class="col-md-6">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">FORMULIR PERMINTAAN USER ID/PASSWORD E-PURCHASING</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('home/pengajuan/submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" class="form-control" name="nip" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="pangkat_pegawai_id" id="" class="form-control" required>
                                    <option value="" selected="true" disabled="disabled">-- Pilih Jabatan & Golongan --</option>
                                    @foreach($data as $row)
                                        <option value="{{$row['id']}}">{{$row['pangkat']}} - {{$row['golongan']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" name="telepon" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control textarea" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>SKPD</label>
                                <input type="text" class="form-control" name="skpd" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Jenis Pengajuan</label>
                                <select name="type_pengajuan" id="jenis_pengajuan" class="form-control">
                                    <option value="PPKom">PPKom</option>
                                    <option value="Pejabat Pengadaan">Pejabat Pengadaan</option>
                                    <option value="Pejabat Pemesan (apabila personil bukan PPKom dan Pejabat Pengadaan)">Pejabat Pemesan (apabila personil bukan PPKom dan Pejabat Pengadaan)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Mulai Masa Berlaku SK</label>
                                <input type="date" class="form-control datepick" name="masa_berlaku" required data-date-format="DD MMMM YYYY">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Akhir Masa Berlaku SK</label>
                                <input type="date" class="form-control datepick" name="akhir_masa_berlaku" required data-date-format="DD MMMM YYYY">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nomor SK / Surat Tugas</label>
                                <input type="text" class="form-control" name="nomor_sk" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6 pl-1">
                            <label>Lampiran SK / Surat Tugas</label> <br>
                            <input type="file" name="file" class="form-control-file" id="file_picker" accept="image/jpeg,image/png,application/pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('home.page_info.pengajuan')
</div>
