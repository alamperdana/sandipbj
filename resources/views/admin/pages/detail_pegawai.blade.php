<div class="row">
    @if(session()->has('alert'))
        <div class="col-md-12">
            @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
            'message' => json_decode(session()->get('alert'))->message])
        </div>
    @endif
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-header">
                Data Pegawai
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('admin/pegawai/update/'.$data['pegawai']->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" value="{{$data['pegawai']->nama}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" class="form-control" name="nip" value="{{$data['pegawai']->nip}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="pangkat_pegawai_id" id="" class="form-control" required>
                                    <option value="{{$data['detail_jabatan']->id}}" selected="true">{{$data['detail_jabatan']->pangkat}} - {{$data['detail_jabatan']->golongan}}</option>
                                    @foreach($data['jabatan'] as $row)
                                        @if($row['id'] != $data['detail_jabatan']->id)
                                            <option value="{{$row['id']}}">{{$row['pangkat']}} - {{$row['golongan']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" name="telepon" class="form-control" value="{{$data['pegawai']->telepon}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{$data['pegawai']->email}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control textarea" name="alamat">{{$data['pegawai']->alamat}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        Buat Akun
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('admin/akun/add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>User ID</label>
                                        <input type="text" class="form-control" name="user_id" required>
                                        <input type="hidden" class="form-control" name="id" value="{{$data['pegawai']->id}}">
                                    </div>
                                </div>

                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pengajuan</label>
                                        <select name="pengajuan_id" id="" class="form-control" required>
                                            <option value="" selected="true" disabled="disabled">-- Pilih Pengajuan --</option>
                                            @foreach($data['pengajuan'] as $row)
                                                <option value="{{$row['id']}}">{{$row['type_pengajuan']}} - {{$row['nomor_sk']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{$data['pegawai']->id}}" name="pegawai_id">

                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="akun">
                            <thead class=" text-primary">
                            <th>
                                User ID
                            </th>

                            <th>
                                Password
                            </th>

                            <th>
                                Masa Berlaku
                            </th>

                            <th>
                                Nomor SK
                            </th>

                            <th>
                                Nomor Sertifkat*Khusus PPBJ/Pokja
                            </th>

                            <th>
                                Lampiran SK
                            </th>

                            <th>
                                Lampiran TTD
                            </th>

                            </thead>
                            <tbody>
                            @foreach ($data['akun'] as $row)
                                <tr>
                                    <td>{{$row['user_id']}}</td>
                                    <td>{{$row['password']}}</td>
                                    <td>{{$row['masa_berlaku']}}</td>
                                    <td>{{$row['nomor_sk']}}</td>
                                    <td>{{$row['sertifikat']}}</td>
                                    <td>{{$row['keterangan']}}</td>
                                    <td>{{$row['nik']}}</td>
                                    <td><a href="{{asset('UPLOAD_PATH'.'/'.$row['lampiran_file'])}}" download>Unduh</a></td>
                                    <td><a href="{{asset('UPLOAD_PATH'.'/'.$row['lampiran_ttd'])}}" download>Unduh</a></td>
                                    <td>
                                        @if($row['is_active'] == 1)
                                            <a href="{{url('admin/akun/update-status/'.$row['id'])}}" class="btn btn-warning"> <i class="nc-icon nc-tile-56"></i> Non Aktifkan</a>
                                        @else
                                            <a href="{{url('admin/akun/update-status/'.$row['id'])}}" class="btn btn-success"> <i class="nc-icon nc-tile-56"></i> Aktifkan</a>
                                        @endif
                                        <a href="{{url('admin/akun/delete/'.$row['id'])}}" class="btn btn-danger"> <i class="nc-icon nc-simple-remove"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.data_table', ['target' => '#akun'])
